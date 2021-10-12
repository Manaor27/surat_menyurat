<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuketController extends Controller
{
    public function index(){
        return view('suket');
    }
    
    public function tambah(){
        return view('tambahsuran');
    }
}
