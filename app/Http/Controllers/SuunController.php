<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuunController extends Controller
{
    public function index(){
        return view('suun');
    }
}
