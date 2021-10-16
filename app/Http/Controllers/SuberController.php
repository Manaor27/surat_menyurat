<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenSurat;
use App\Models\Suber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuberController extends Controller
{
    public function index(){
        return view('suber');
    }

    public function simpan(Request $request) {
        $manajemen = DB::table('manajemen_surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($manajemen as $man) {
            $id_man = $man->id;
        }
        $count = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',5)->get();
        //$b = '';
        foreach ($count as $cy) {
            if ($cy->banyak>="0") {
                $b = "00".($cy->banyak+1)."/E/FTI/".date('Y');
            }elseif ($cy->banyak>="9") {
                $b = "0".($cy->banyak+1)."/E/FTI/".date('Y');
            }elseif ($cy->banyak>="99") {
                $b = ($cy->banyak+1)."/E/FTI/".date('Y');
            }
        }
        Suber::create([
            'no_surat' => $b,
            'tema' => $request->tema,
            'tanggal' => $request->tanggal,
            'target' => $request->target,
            'pembicara' => $request->pembicara,
            'tempat' => $request->tempat,
            'id_manajemen' => $id_man
        ]);
        return redirect("/home");
    }
}
