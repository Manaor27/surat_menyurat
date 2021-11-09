<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuberController extends Controller
{
    public function index(){
        return view('suber');
    }

    public function simpan(Request $request) {
        Surat::create([
            'perihal' => $request->tema,
            'tanggal' => $request->tanggal,
            'target' => $request->target,
            'tamu' => $request->pembicara,
            'tempat' => $request->tempat,
            'id_user' => Auth::id(),
            'id_jenis' => '5'
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        Informasi::create([
            'no_surat' => null,
            'status' => 'on process',
            'tanggal' => date('Y-m-d'),
            'id_surat' => $id_srt,
            'id_pejabat' => null
        ]);
        return redirect("/home");
    }
}
