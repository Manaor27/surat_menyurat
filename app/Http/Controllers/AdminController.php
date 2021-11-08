<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
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
        $count_super = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_jenis',1)->get();
        $count_sutug = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_jenis',4)->get();
        $count_suket = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_jenis',2)->get();
        $count_suun = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_jenis',3)->get();
        $count_suber = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_jenis',5)->get();
        $tab = Informasi::all();
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
        if ($id=='1') {
            return redirect("/suratPersonalia");
        }elseif ($id=='4'){
            return redirect("/suratTugas");
        }elseif ($id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($id=='3') {
            return redirect("/suratUndangan");
        }elseif ($id=='5') {
            return redirect("/suratBerita");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }

    public function preview(Request $request,$id) {
        $pre = Surat::find($id);
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
        $down = Informasi::find($id);
        $jabat = Pejabat::find($down->id_pejabat);
        if ($down->surat->id_jenis=='2') {
            $pdf = PDF::loadview('dsuket', compact('down','jabat'));
            return $pdf->download('Surat Keterangan.pdf');
        }
    }
}
