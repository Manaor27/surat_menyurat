<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suber;
use Illuminate\Support\Facades\Auth;

class SuberController extends Controller
{
    public function index(){
        return view('suber');
    }

    public function simpan(Request $request) {
        $suber = Suber::select('id')->get();
        Suber::create([
            'no_surat' => '00'.(count($suber)+1).'/E/FTI/'.date('Y'),
            'tema' => $request->tema,
            'tanggal' => $request->tanggal,
            'target' => $request->target,
            'pembicara' => $request->pembicara,
            'tempat' => $request->tempat,
            'id_user' => Auth::id()
        ]);
        return redirect("/home");
    }
}
