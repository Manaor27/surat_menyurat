<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;
use Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $super = JenisSurat::find(1);
        $sutug = JenisSurat::find(4);
        $count_super = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_user',Auth::id())->where('manajemen_surat.id_jenis',1)->get();
        $count_sutug = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_user',Auth::id())->where('manajemen_surat.id_jenis',4)->get();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('surat.no_surat as no_surat, surat.perihal as tema, informasi.status as status, surat.id as suratid'))->where('manajemen_surat.id_user',Auth::id())->get();
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
        $jenis = JenisSurat::find($id);
        ManajemenSurat::create([
            'id_user' => Auth::id(),
            'id_jenis' => $jenis->id
        ]);
        if ($jenis->id=='1') {
            return redirect("/suratPersonalia");
        }elseif ($jenis->id=='4'){
            return redirect("/suratTugas");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }
}
