<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('admin.smasuk');
    }
}
