<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pejabat;
use App\Models\Informasi;

class TerkirimController extends Controller
{
    public function index(){
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->join('users','id_user','=','users.id')->select(DB::raw('informasi.no_surat as no_surat, surat.perihal as tema, informasi.status as status, informasi.id as informasiid, surat.id as suratid, informasi.id_pejabat as pejabat, users.kode as code, informasi.tanggal as tgl'))->get();
        foreach ($tab as $tbl) {
            $idjabat = $tbl->pejabat;
        }
        $jabat = Informasi::all();
        return view('terkirim', compact('tab','jabat'));
    }

    public function edit($id) {
        $infor = Informasi::find($id);
        $jabat = Pejabat::all();
        return view('validasi', compact('infor','jabat'));
    }

    public function update($id, Request $request) {
        $up = Informasi::find($id);
        $in = Informasi::all();
        foreach ($in as $i) {
            $no = $in->surat->id_jenis;
        }
        $count1 = count($no=='1');
        $count2 = count($no=='2');
        $count3 = count($no=='3');
        $count4 = count($no=='4');
        $count5 = count($no=='5');
        if ($no=='1') {
            if ($count1>="0") {
                $b = "00".($count1+1)."/A/FTI/".date('Y');
            }elseif ($count1k>="9") {
                $b = "0".($count1+1)."/A/FTI/".date('Y');
            }elseif ($count1>="99") {
                $b = ($count1+1)."/A/FTI/".date('Y');
            }
        }elseif ($no=='2') {
            if ($count2>="0") {
                $b = "00".($count2+1)."/B/FTI/".date('Y');
            }elseif ($count2>="9") {
                $b = "0".($count2+1)."/B/FTI/".date('Y');
            }elseif ($count2>="99") {
                $b = ($count2+1)."/B/FTI/".date('Y');
            }
        }elseif ($no=='3') {
            if ($count3>="0") {
                $b = "00".($count3+1)."/C/FTI/".date('Y');
            }elseif ($count3>="9") {
                $b = "0".($count3+1)."/C/FTI/".date('Y');
            }elseif ($count3>="99") {
                $b = ($count3+1)."/C/FTI/".date('Y');
            }
        }elseif ($no=='4') {
            if ($count4>="0") {
                $b = "00".($count4+1)."/D/FTI/".date('Y');
            }elseif ($count4>="9") {
                $b = "0".($count4+1)."/D/FTI/".date('Y');
            }elseif ($count4>="99") {
                $b = ($count4+1)."/D/FTI/".date('Y');
            }
        }else {
            if ($count5>="0") {
                $b = "00".($count5+1)."/E/FTI/".date('Y');
            }elseif ($count5>="9") {
                $b = "0".($count5+1)."/E/FTI/".date('Y');
            }elseif ($count5>="99") {
                $b = ($count5+1)."/E/FTI/".date('Y');
            }
        }
        $up->no_surat = $b;
        $up->id_pejabat = $request->pejabat;
        $up->save();
        return redirect('/suratTerkirim');
    }
}
