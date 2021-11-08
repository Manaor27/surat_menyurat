<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperController extends Controller
{
    public function index(){
        return view('super');
    }

    public function simpan(Request $request) {
        $count = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_jenis',1)->get();
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
        DB::table('surat')->insert([
            'perihal' => $request->perihal,
            'keterangan' => $ket,
            'id_user' => Auth::id(),
            'id_jenis' => '1'
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
