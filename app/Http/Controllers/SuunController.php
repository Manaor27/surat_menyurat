<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuunController extends Controller
{
    public function index(){
        $jabat = Pejabat::all();
        return view('surat.suun', compact('jabat'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'keterangan' => 'required',
        ]);
        Surat::create([
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'id_user' => Auth::id(),
            'id_jenis' => '3'
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        $count3 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',3)->count();
        if ($count3>="0") {
            $b = "00".($count3+1)."/C/FTI/".date('Y');
        }elseif ($count3>="9") {
            $b = "0".($count3+1)."/C/FTI/".date('Y');
        }elseif ($count3>="99") {
            $b = ($count3+1)."/C/FTI/".date('Y');
        }
        Informasi::create([
            'no_surat' => $b,
            'status' => 'disetujui',
            'tanggal' => date('Y-m-d'),
            'id_pejabat' => $request->pejabat,
            'id_surat' => $id_srt
        ]);
        return redirect("/home");
    }
}
