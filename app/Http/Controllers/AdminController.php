<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;
use App\Models\Informasi;
use App\Models\Pejabat;
use Auth;
use PDF;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $super = JenisSurat::find(1);
        $sutug = JenisSurat::find(4);
        $suket = JenisSurat::find(2);
        $suun = JenisSurat::find(3);
        $suber = JenisSurat::find(5);
        $count_super = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',1)->get();
        $count_sutug = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',4)->get();
        $count_suket = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',2)->get();
        $count_suun = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',3)->get();
        $count_suber = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',5)->get();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('surat.no_surat as no_surat, surat.perihal as tema, informasi.status as status, informasi.id as informasiid, surat.id as suratid, informasi.id_pejabat as pejabat'))->get();
        foreach ($count_super as $csuper) {
            $banyak_super = $csuper->banyak;
        }
        foreach ($count_sutug as $csutug) {
            $banyak_sutug = $csutug->banyak;
        }
        foreach ($count_suket as $csuket) {
            $banyak_suket = $csuket->banyak;
        }
        foreach ($count_suber as $csuber) {
            $banyak_suber = $csuber->banyak;
        }
        foreach ($count_suun as $csuun) {
            $banyak_suun = $csuun->banyak;
        }
        return view('admin.home', compact('user','super','sutug','suun','suber','suket','banyak_super','banyak_suket','banyak_suun','banyak_sutug','banyak_suber','tab'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('admin.smasuk');
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
        }elseif ($jenis->id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($jenis->id=='3') {
            return redirect("/suratUndangan");
        }elseif ($jenis->id=='5') {
            return redirect("/suratBerita");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }

    public function preview(Request $request,$id) {
        $pre = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->join('users','id_user','=','users.id')->select(DB::raw('surat.no_surat as no_surat, surat.perihal as hal, surat.kepada as kepada, surat.keterangan as keterangan, surat.tanggal as tanggal, surat.waktu as waktu, surat.tempat as tempat, surat.kode as kode, surat.nama as name, surat.penyelenggara as penyelenggara, surat.target as target, surat.tamu as tamu, manajemen_surat.id_jenis as jenis, users.name as nama'))->where('surat.id',$id)->get();
        return view('admin.show', compact('pre'))->renderSections()['content'];
    }

    public function edit($id) {
        $infor = DB::table('informasi')->join('surat','id_surat','=','surat.id')->select(DB::raw('surat.id as surid, surat.no_surat as no_surat ,surat.perihal as hal, informasi.status as status, informasi.id as id'))->where('informasi.id',$id)->get();
        return view('editstatus', compact('infor'));
    }

    public function update($id, Request $request) {
        $up = Informasi::find($id);
        $up->status = $request->status;
        $up->tanggal = date('Y-m-d');
        $up->save();
        return redirect('/home');
    }

    public function download($id) {
        $down = DB::table('informasi')->join('surat','id_surat','=','surat.id')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('informasi.id_pejabat as pejabat, surat.no_surat as no_surat, surat.perihal as hal, surat.kepada as kepada, surat.keterangan as keterangan, surat.tanggal as tanggal, surat.waktu as waktu, surat.tempat as tempat, surat.kode as kode, surat.nama as nama, surat.penyelenggara as penyelenggara, surat.target as target, surat.tamu as tamu, manajemen_surat.id_jenis as jenis'))->where('informasi.id',$id)->get();
        foreach ($down as $load) {
            $jabat = Pejabat::find($load->pejabat);
            if ($load->jenis=='2') {
                $pdf = PDF::loadview('dsuket', compact('load','jabat'));
                return $pdf->download('Surat Keterangan.pdf');
            }
        }
    }
}
