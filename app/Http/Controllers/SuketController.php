<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuketController extends Controller
{
    public function index(){
        $pengguna = User::where('role','mahasiswa')->get();
        return view('suket', compact('pengguna'));
    }
    
    public function simpan(Request $request) {
        Surat::create([
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'id_user' => $request->pengguna,
            'id_jenis' => '2'
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        Informasi::create([
            'no_surat' => null,
            'status' => 'sedang diproses',
            'tanggal' => date('Y-m-d'),
            'id_surat' => $id_srt,
            'id_pejabat' => null
        ]);
        return redirect("/home");
    }

    public function update($id, Request $request) {
        $skt = Surat::find($id);
        $skt->perihal = $request->perihal;
        $skt->kepada = $request->kepada;
        $skt->keterangan = $request->keterangan;
        $skt->tanggal = $request->tanggal;
        $skt->waktu = $request->waktu;
        $skt->tempat = $request->tempat;
        $skt->save();
        return redirect('/home');
    }
}