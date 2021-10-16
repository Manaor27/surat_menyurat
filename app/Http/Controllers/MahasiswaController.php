<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suket = JenisSurat::find(2);
        $sutug = JenisSurat::find(4);
        return view('mahasiswa.home', compact('user','suket','sutug'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('mahasiswa.smasuk');
    }

    public function simpan($id){
        $jenis = JenisSurat::find($id);
        ManajemenSurat::create([
            'id_user' => Auth::id(),
            'id_jenis' => $jenis->id
        ]);
        if ($jenis->id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($jenis->id=='4'){
            return redirect("/suratTugas");
        }
    }
}
