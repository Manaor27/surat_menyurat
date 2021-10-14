<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Super;
use Illuminate\Support\Facades\Auth;

class SuperController extends Controller
{
    public function index(){
        return view('super');
    }

    public function simpan(Request $request) {
        $super = Super::select('id')->get();
        $ket = implode(",", $request->get('keterangan'));
        Super::create([
            'no_surat' => '00'.(count($super)+1).'/A/FTI/'.date('Y'),
            'perihal' => $request->perihal,
            'isi' => $ket,
            'id_user' => Auth::id()
        ]);
        return redirect("/home");
    }
}
