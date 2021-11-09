<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pejabat;
use App\Models\Informasi;
use App\Models\Surat;

class TerkirimController extends Controller
{
    public function index(){
        $tab = Informasi::all();
        $jabat = Pejabat::all();
        return view('terkirim', compact('tab','jabat'));
    }

    public function edit($id) {
        $info = Informasi::find($id);
        $jabat = Pejabat::all();
        return view('validasi', compact('info','jabat'));
    }

    public function update($id, Request $request) {
        $up = Informasi::find($id);
        $count1 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',1)->count();
        $count2 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',2)->count();
        $count3 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',3)->count();
        $count4 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',4)->count();
        $count5 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',5)->count();
        if ($up->surat->id_jenis=='1') {
            if ($count1>="0") {
                $b = "00".($count1+1)."/A/FTI/".date('Y');
            }elseif ($count1k>="9") {
                $b = "0".($count1+1)."/A/FTI/".date('Y');
            }elseif ($count1>="99") {
                $b = ($count1+1)."/A/FTI/".date('Y');
            }
        }elseif ($up->surat->id_jenis=='2') {
            if ($count2>="0") {
                $b = "00".($count2+1)."/B/FTI/".date('Y');
            }elseif ($count2>="9") {
                $b = "0".($count2+1)."/B/FTI/".date('Y');
            }elseif ($count2>="99") {
                $b = ($count2+1)."/B/FTI/".date('Y');
            }
        }elseif ($up->surat->id_jenis=='3') {
            if ($count3>="0") {
                $b = "00".($count3+1)."/C/FTI/".date('Y');
            }elseif ($count3>="9") {
                $b = "0".($count3+1)."/C/FTI/".date('Y');
            }elseif ($count3>="99") {
                $b = ($count3+1)."/C/FTI/".date('Y');
            }
        }elseif ($up->surat->id_jenis=='4') {
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
