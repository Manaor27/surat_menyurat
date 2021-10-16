<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenSurat;
use App\Models\Informasi;
use App\Models\Sutug;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SutugController extends Controller
{
    public function index(){
        return view('sutug');
    }

    public function simpan(Request $request) {
        $count = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',4)->get();
        //$b = '';
        foreach ($count as $cy) {
            if ($cy->banyak>="0") {
                $b = "00".($cy->banyak+1)."/D/FTI/".date('Y');
            }elseif ($cy->banyak>="9") {
                $b = "0".($cy->banyak+1)."/D/FTI/".date('Y');
            }elseif ($cy->banyak>="99") {
                $b = ($cy->banyak+1)."/D/FTI/".date('Y');
            }
        }
        $manajemen = DB::table('manajemen_surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($manajemen as $man) {
            $id_man = $man->id;
        }
        //$count = 
        $kode = implode(",", $request->get('kode'));
        $nama = implode(",", $request->get('nama'));
        DB::table('surat')->insert([
            'no_surat' => $b,
            'perihal' => $request->tema,
            'kode' => $kode,
            'nama' => $nama,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
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
            'id_surat' => $id_srt
        ]);
        return redirect("/home");
    }
}
