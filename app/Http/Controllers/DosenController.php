<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DosenController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dosen.home', compact('user'));
    }
}
