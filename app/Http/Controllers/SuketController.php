<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenSurat;
use App\Models\Informasi;
use App\Models\Suket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuketController extends Controller
{
    public function index(){
        return view('suket');
    }
    
    public function simpan(Request $request) {
        $manajemen = DB::table('manajemen_surat')->where('id_user',Auth::id())->orderBy('id','desc')->limit('1')->get();
        foreach ($manajemen as $man) {
            $id_man = $man->id;
        }
        $count = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',2)->get();
        //$b = '';
        foreach ($count as $cy) {
            if ($cy->banyak>="0") {
                $b = "00".($cy->banyak+1)."/B/FTI/".date('Y');
            }elseif ($cy->banyak>="9") {
                $b = "0".($cy->banyak+1)."/B/FTI/".date('Y');
            }elseif ($cy->banyak>="99") {
                $b = ($cy->banyak+1)."/B/FTI/".date('Y');
            }
        }
        Suket::create([
            'no_surat' => $b,
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'id_manajemen' => $id_man
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        Informasi::create([
            'status' => 'on process',
            'tanggal' => date('Y-m-d'),
            'id_surat' => $id_srt,
            'id_pejabat' => null
        ]);
        return redirect("/home");
    }

    public function update($id, Request $request) {
        $skt = Suket::find($id);
        $skt->no_surat = $request->no_surat;
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