<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SutugController extends Controller
{
    public function index(){
        return view('sutug');
    }
}
