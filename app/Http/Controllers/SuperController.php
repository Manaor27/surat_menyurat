<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenSurat;
use App\Models\Super;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperController extends Controller
{
    public function index(){
        return view('super');
    }

    public function simpan(Request $request) {
        $manajemen = DB::table('manajemen_surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($manajemen as $man) {
            $id_man = $man->id;
        }
        $count = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('count(manajemen_surat.id_jenis) as banyak'))->where('manajemen_surat.id_jenis',1)->get();
        //$b = '';
        foreach ($count as $cy) {
            if ($cy->banyak>="0") {
                $b = "00".($cy->banyak+1)."/A/FTI/".date('Y');
            }elseif ($cy->banyak>="9") {
                $b = "0".($cy->banyak+1)."/A/FTI/".date('Y');
            }elseif ($cy->banyak>="99") {
                $b = ($cy->banyak+1)."/A/FTI/".date('Y');
            }
        }
        $ket = implode(",", $request->get('keterangan'));
        Super::create([
            'no_surat' => $b,
            'perihal' => $request->perihal,
            'keterangan' => $ket,
            'id_manajemen' => $id_man
        ]);
        return redirect("/home");
    }
}
