<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suket;
use App\Models\Sutug;
use Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suket = Suket::select('id')->where('id_user',Auth::id())->get();
        $sutug = Sutug::select('id')->where('id_user',Auth::id())->get();
        return view('mahasiswa.home', compact('user','suket','sutug'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('mahasiswa.smasuk');
    }
}
