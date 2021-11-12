<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use App\Models\JenisSurat;
use App\Models\Surat;
use App\Models\Informasi;
use App\Models\Pejabat;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suket = JenisSurat::find(2);
        $sutug = JenisSurat::find(4);
        $count_suket = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_user',Auth::id())->where('id_jenis',2)->get();
        $count_sutug = DB::table('surat')->select(DB::raw('kode'))->where('id_user',Auth::id())->where('id_jenis',4)->get();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->select(DB::raw('informasi.no_surat as no_surat, surat.perihal as tema, informasi.status as status, surat.id as suratid, informasi.id as inforid, informasi.id_pejabat as pejabat'))->where('surat.id_user',Auth::id())->get();
        foreach ($count_suket as $csuket) {
            $banyak_suket = $csuket->banyak;
        }
        $sutk = array();
        foreach ($count_sutug as $csutug) {
            $sutk = explode(',', $csutug->kode);
            $banyak_sutugk = count($sutk)>1;
            $banyak_sutugp = count($sutk)==1;
        }
        return view('mahasiswa.home', compact('user','suket','sutug','banyak_suket','banyak_sutugk','banyak_sutugp','tab'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('mahasiswa.smasuk');
    }

    public function simpan($id){
        if ($id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($id=='4'){
            return redirect("/suratTugas");
        }else {
            return view("sutugp");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }

    public function edit($id) {
        $srt = Surat::find($id);
        if ($srt->id_jenis=='2') {
            return view('editsuket', compact('srt'));
        }elseif ($srt->id_jenis=='4') {
            return view('editsutug', compact('srt'));
        }
    }

    public function download($id) {
        $down = Informasi::find($id);
        if ($down->surat->id_jenis=='2') {
            $pdf = PDF::loadview('dsuket', compact('down'));
            return $pdf->download('Surat Keterangan.pdf');
        }elseif ($down->surat->id_jenis=='4') {
            $pdf = PDF::loadview('dsutug', compact('down'));
            return $pdf->download('Surat Tugas.pdf');
        }
    }
}