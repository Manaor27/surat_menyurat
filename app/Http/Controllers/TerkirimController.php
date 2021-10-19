<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pejabat;
use App\Models\Informasi;

class TerkirimController extends Controller
{
    public function index(){
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->join('users','id_user','=','users.id')->select(DB::raw('surat.no_surat as no_surat, surat.perihal as tema, informasi.status as status, informasi.id as informasiid, surat.id as suratid, informasi.id_pejabat as pejabat, users.kode as code, informasi.tanggal as tgl'))->get();
        foreach ($tab as $tbl) {
            $idjabat = $tbl->pejabat;
        }
        $jabat = Pejabat::find($idjabat);
        return view('terkirim', compact('tab','jabat'));
    }

    public function edit($id) {
        $infor = DB::table('informasi')->join('surat','id_surat','=','surat.id')->select(DB::raw('surat.id as surid, surat.no_surat as no_surat ,surat.perihal as hal, informasi.status as status, informasi.id as id'))->where('informasi.id',$id)->get();
        $jabat = Pejabat::all();
        return view('validasi', compact('infor','jabat'));
    }

    public function update($id, Request $request) {
        $up = Informasi::find($id);
        $up->id_pejabat = $request->pejabat;
        $up->save();
        return redirect('/suratTerkirim');
    }
}
