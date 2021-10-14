<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sutug;
use Illuminate\Support\Facades\Auth;

class SutugController extends Controller
{
    public function index(){
        return view('sutug');
    }

    public function simpan(Request $request) {
        $sutug = Sutug::select('id')->get();
        $kode = implode(",", $request->get('kode'));
        $nama = implode(",", $request->get('nama'));
        Sutug::create([
            'no_surat' => '00'.(count($sutug)+1).'/D/FTI/'.date('Y'),
            'tema' => $request->tema,
            'kode' => $kode,
            'nama' => $nama,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'id_user' => Auth::id()
        ]);
        return redirect("/home");
    }
}
