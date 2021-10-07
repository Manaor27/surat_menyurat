<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.home', compact('user'));
    }
}
