<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerkirimController extends Controller
{
    public function index(){
        return view('terkirim');
    }
}
