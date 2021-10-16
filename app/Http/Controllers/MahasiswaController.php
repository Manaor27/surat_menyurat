<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suket = JenisSurat::find(2);
        $sutug = JenisSurat::find(4);
        $count_suket = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_user',Auth::id())->where('manajemen_surat.id_jenis',2)->get();
        $count_sutug = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_user',Auth::id())->where('manajemen_surat.id_jenis',4)->get();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('surat.no_surat as no_surat, surat.perihal as tema, informasi.status as status, surat.id as suratid'))->where('manajemen_surat.id_user',Auth::id())->get();
        foreach ($count_suket as $csuket) {
            $banyak_suket = $csuket->banyak;
        }
        foreach ($count_sutug as $csutug) {
            $banyak_sutug = $csutug->banyak;
        }
        return view('mahasiswa.home', compact('user','suket','sutug','banyak_suket','banyak_sutug','tab'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('mahasiswa.smasuk');
    }

    public function simpan($id){
        $jenis = JenisSurat::find($id);
        ManajemenSurat::create([
            'id_user' => Auth::id(),
            'id_jenis' => $jenis->id
        ]);
        if ($jenis->id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($jenis->id=='4'){
            return redirect("/suratTugas");
        }
    }
}
