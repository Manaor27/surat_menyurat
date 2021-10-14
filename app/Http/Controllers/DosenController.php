<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sutug;
use App\Models\Super;
use Auth;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sutug = Sutug::select('id')->where('id_user',Auth::id())->get();
        $super = Super::select('id')->where('id_user',Auth::id())->get();
        return view('dosen.home', compact('user','sutug','super'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('dosen.smasuk');
    }
}
