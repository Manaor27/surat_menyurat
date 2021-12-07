<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\Informasi;
use App\Models\Surat;
use PDF;
use Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $count_suket = Surat::where('id_user',Auth::id())->where('id_jenis',2)->count();
        $count_super = Surat::where('id_user',Auth::id())->where('id_jenis',1)->count();
        $count_sutugp = Surat::where('id_user',Auth::id())->where('id_jenis',4)->where('kode',Auth::user()->kode)->count();
        $count_sutug = Surat::where('id_user',Auth::id())->where('id_jenis',4)->where('kode','!=',Auth::user()->kode)->count();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->select(DB::raw('informasi.no_surat as no_surat, surat.perihal as tema, informasi.status as status, surat.id as suratid, informasi.id_pejabat as pejabat, informasi.id as inforid'))->where('surat.id_user',Auth::id())->get();
        return view('dosen.home', compact('user','count_suket','count_sutug','count_sutugp','count_super','tab'));
    }

    public function smasuk()
    {
        return view('dosen.smasuk');
    }

    public function simpan($id){
        if ($id=='2') {
            Surat::create([
                'perihal' => 'Surat Keterangan Aktif',
                'id_user' => Auth::user()->id,
                'id_jenis' => '2'
            ]);
            $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
            foreach ($surat as $srt) {
                $id_srt = $srt->id;
            }
            Informasi::create([
                'no_surat' => null,
                'status' => 'disetujui',
                'tanggal' => date('Y-m-d'),
                'id_surat' => $id_srt,
                'id_pejabat' => null
            ]);
            return redirect("/home");
        }elseif ($id=='4'){
            return redirect("/suratTugas");
        }elseif ($id=='1') {
            return redirect("/suratPersonalia");
        }else {
            return view("surat.sutugp");
        }
    }

    public function delete($id) {
        $srt = Surat::find($id);
        $srt->delete();
        return redirect('/home');
    }

    public function edit($id,$id2) {
        $srt = Surat::find($id);
        $info = Informasi::find($id2);
        if ($srt->id_jenis=='4') {
            return view('surat.editsutug', compact('srt','info'));
        }
    }

    public function download($id) {
        $down = Informasi::find($id);
        if ($down->surat->id_jenis=='1') {
            $pdf = PDF::loadview('download.dsuper', compact('down'));
            return $pdf->download('Surat Personalia.pdf');
        }elseif ($down->surat->id_jenis=='4') {
            $pdf = PDF::loadview('download.dsutug', compact('down'));
            return $pdf->download('Surat Tugas.pdf');
        }elseif ($down->surat->id_jenis=='2') {
            $pdf = PDF::loadview('download.dsuket', compact('down'));
            return $pdf->download('Surat Keterangan.pdf');
        }
    }
}
