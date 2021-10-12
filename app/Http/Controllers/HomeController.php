<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if($role == "admin"){
            return redirect()->to('admin');
        } else if($role == "dosen"){
            return redirect()->to('dosen');
        } else if($role == "mahasiswa"){
            return redirect()->to('mahasiswa');
        } else {
            return redirect()->to('logout');
        }
    }

    public function smasuk()
    {
        $role = Auth::user()->role;
        if($role == "admin"){
            return redirect()->to('suratMasuka');
        } else if($role == "dosen"){
            return redirect()->to('suratMasukd');
        } else{
            return redirect()->to('suratMasukm');
        } 
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
