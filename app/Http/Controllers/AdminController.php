<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $super = JenisSurat::find(1);
        $sutug = JenisSurat::find(4);
        $suun = JenisSurat::find(3);
        $suber = JenisSurat::find(5);
        $suket = JenisSurat::find(2);
        return view('admin.home', compact('user','super','sutug','suun','suber','suket'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('admin.smasuk');
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
        }elseif ($jenis->id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($jenis->id=='3') {
            return redirect("/suratUndangan");
        }elseif ($jenis->id=='5') {
            return redirect("/suratBerita");
        }
    }
}
