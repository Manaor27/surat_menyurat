<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\Informasi;
use Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $super = JenisSurat::find(1);
        $sutug = JenisSurat::find(4);
        $count_super = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_user',Auth::id())->where('id_jenis',1)->get();
        $count_sutug = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_user',Auth::id())->where('id_jenis',4)->get();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->select(DB::raw('informasi.no_surat as no_surat, surat.perihal as tema, informasi.status as status, surat.id as suratid'))->where('surat.id_user',Auth::id())->get();
        foreach ($count_super as $csuper) {
            $banyak_super = $csuper->banyak;
        }
        foreach ($count_sutug as $csutug) {
            $banyak_sutug = $csutug->banyak;
        }
        return view('dosen.home', compact('user','sutug','super','banyak_super','banyak_sutug','tab'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('dosen.smasuk');
    }

    public function simpan($id){
        if ($id=='1') {
            return redirect("/suratPersonalia");
        }elseif ($id=='4'){
            return redirect("/suratTugas");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }

    public function download($id) {
        $down = Informasi::find($id);
        if ($down->surat->id_jenis=='1') {
            $pdf = PDF::loadview('dsuper', compact('down'));
            return $pdf->download('Surat Personalia.pdf');
        }elseif ($down->surat->id_jenis=='4') {
            $pdf = PDF::loadview('dsutug', compact('down'));
            return $pdf->download('Surat Tugas.pdf');
        }
    }
}
