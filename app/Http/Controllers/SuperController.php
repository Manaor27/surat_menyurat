<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SuperController extends Controller
{
    public function index(){
        $user = User::where('role','!=','mahasiswa')->get();
        $jabat = Pejabat::all();
        return view('surat.super', compact('user','jabat'));
    }

    public function simpan(Request $request) {
        if ($request->jenis==1) {
            $request->validate([
                'keterangan' => 'required',
                'menimbang' => 'required',
                'mengingat' => 'required',
            ]);
            DB::table('surat')->insert([
                'perihal' => $request->perihal,
                'keterangan' => $request->keterangan,
                'menimbang' => $request->menimbang,
                'mengingat' => $request->mengingat,
                'id_user' => $request->pengguna,
                'id_jenis' => '1'
            ]);
        }else {
            $request->validate([
                'keterangan' => 'required',
            ]);
            DB::table('surat')->insert([
                'perihal' => $request->perihal,
                'keterangan' => $request->keterangan,
                'kepada' => $request->kepada,
                'id_user' => $request->pengguna,
                'id_jenis' => '1'
            ]);
        }
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        $count1 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',1)->count();
        if ($count1>="0") {
            $b = "00".($count1+1)."/A/FTI/".date('Y');
        }elseif ($count1k>="9") {
            $b = "0".($count1+1)."/A/FTI/".date('Y');
        }elseif ($count1>="99") {
            $b = ($count1+1)."/A/FTI/".date('Y');
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

    public function update($id, Request $request) {
        $skt = Surat::find($id);
        $skt->perihal = $request->perihal;
        $skt->keterangan = $request->keterangan;
        $skt->save();
        return redirect('/home');
    }
}
