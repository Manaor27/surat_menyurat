<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suun;
use Illuminate\Support\Facades\Auth;

class SuunController extends Controller
{
    public function index(){
        return view('suun');
    }

    public function simpan(Request $request) {
        $suket = Suket::select('id')->get();
        Suket::create([
            'no_surat' => '00'.(count($suket)+1).'/C/FTI/'.date('Y'),
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'id_user' => Auth::id()
        ]);
        return redirect("/home");
    }
}
