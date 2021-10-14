<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suket;
use App\Models\Sutug;
use App\Models\Super;
use App\Models\Suber;
use App\Models\Suun;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suket = Suket::select('id')->get();
        $sutug = Sutug::select('id')->get();
        $super = Super::select('id')->get();
        $suber = Suber::select('id')->get();
        $suun = Suun::select('id')->get();
        return view('admin.home', compact('user','suket','sutug','super','suber','suun'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('admin.smasuk');
    }
}
