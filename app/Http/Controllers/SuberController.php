<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuberController extends Controller
{
    public function index(){
        $jabat = Pejabat::all();
        return view('surat.suber', compact('jabat'));
    }

    public function simpan(Request $request) {
        Surat::create([
            'perihal' => $request->tema,
            'kepada' => $request->kepada,
            'tanggal' => $request->tanggal,
            'target' => $request->target,
            'tamu' => $request->pembicara,
            'tempat' => $request->tempat,
            'id_user' => Auth::id(),
            'id_jenis' => '5'
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        $count5 = DB::table('informasi')->join('surat','id_surat','=','surat.id')->where('informasi.id_pejabat','!=',null)->where('surat.id_jenis',5)->count();
        if ($count5>="0") {
            $b = "00".($count5+1)."/E/FTI/".date('Y');
        }elseif ($count5>="9") {
            $b = "0".($count5+1)."/E/FTI/".date('Y');
        }elseif ($count5>="99") {
            $b = ($count5+1)."/E/FTI/".date('Y');
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
