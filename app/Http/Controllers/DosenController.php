<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;
use Auth;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $super = JenisSurat::find(1);
        $sutug = JenisSurat::find(4);
        return view('dosen.home', compact('user','sutug','super'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('dosen.smasuk');
    }

    public function simpan($id){
        $jenis = JenisSurat::find($id);
        ManajemenSurat::create([
            'id_user' => Auth::id(),
            'id_jenis' => $jenis->id
        ]);
        if ($jenis->id=='1') {
            return redirect("/suratPersonalia");
        }elseif ($jenis->id=='4'){
            return redirect("/suratTugas");
        }
    }
}
