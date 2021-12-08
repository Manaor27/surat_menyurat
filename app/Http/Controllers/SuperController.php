<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SuperController extends Controller
{
    public function index(){
        $user = User::where('role','!=','mahasiswa')->get();
        return view('surat.super', compact('user'));
    }

    public function simpan(Request $request) {
        if ($request->jenis==1) {
            $ket = implode("|", $request->get('keterangan'));
            $menimbang = implode("|", $request->get('menimbang'));
            $mengingat = implode("|", $request->get('mengingat'));
            DB::table('surat')->insert([
                'perihal' => $request->perihal,
                'keterangan' => $ket,
                'menimbang' => $menimbang,
                'mengingat' => $mengingat,
                'id_user' => $request->pengguna,
                'id_jenis' => '1'
            ]);
        }else {
            DB::table('surat')->insert([
                'perihal' => $request->perihal,
                'keterangan' => $request->keterangan,
                'kepada' => $request->kepada,
                'id_user' => $request->pengguna,
                'id_jenis' => '1'
            ]);
        }
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        Informasi::create([
            'status' => 'disetujui',
            'id_surat' => $id_srt
        ]);
        return redirect("/home");
    }

    public function update($id, Request $request) {
        $skt = Surat::find($id);
        $skt->perihal = $request->perihal;
        $skt->keterangan = $request->keterangan;
        $skt->save();
        return redirect('/home');
    }
}
