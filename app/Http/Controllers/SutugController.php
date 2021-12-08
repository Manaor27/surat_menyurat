<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Surat;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SutugController extends Controller
{
    public function index(){
        $user = User::all();
        return view('surat.sutug', compact('user'));
    }

    public function simpan(Request $request) {
        $kode = implode(",", $request->get('kode'));
        $nama = implode(",", $request->get('nama'));
        Surat::create([
            'perihal' => $request->tema,
            'kode' => $kode,
            'nama' => $nama,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'id_user' => $request->pengguna,
            'id_jenis' => '4'
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        Informasi::create([
            'status' => 'sedang diproses',
            'id_surat' => $id_srt
        ]);
        return redirect("/home");
    }

    public function getData(Request $request){
        $search = $request->search;
        if($search == '' && Auth::user()->role=='mahasiswa'){
            $data = User::orderby('kode','asc')->select('kode','name')->where('role','mahasiswa')->limit(5)->get();
        }elseif($search != '' && Auth::user()->role=='mahasiswa'){
            $data = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$search . '%')->where('role','mahasiswa')->limit(5)->get();
        }elseif($search == '' && Auth::user()->role=='dosen'){
            $data = User::orderby('kode','asc')->select('kode','name')->where('role','dosen')->limit(5)->get();
        }elseif($search != '' && Auth::user()->role=='dosen'){
            $data = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$search . '%')->where('role','dosen')->limit(5)->get();
        }elseif ($search == '' && Auth::user()->role=='admin') {
            $data = User::orderby('kode','asc')->select('kode','name')->limit(5)->get();
        }elseif ($search != '' && Auth::user()->role=='admin') {
            $data = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($data as $dt){
           $response[] = array("value"=>$dt->name,"label"=>$dt->kode);
        }
        return response()->json($response); 
    }
    
    public function update($id, $id2, Request $request) {
        $kode = implode(",", $request->get('kode'));
        $nama = implode(",", $request->get('nama'));
        $skt = Surat::find($id);
        $info = Informasi::find($id);
        $skt->perihal = $request->tema;
        $skt->kode = $kode;
        $skt->nama = $nama;
        $skt->tanggal = $request->tanggal;
        $skt->penyelenggara = $request->penyelenggara;
        if ($skt->tempat!=null) {
            $skt->tempat = $request->tempat;
        }
        $skt->id_user = Auth::user()->id;
        $info->status = "sedang diproses";
        $skt->save();
        $info->save();
        return redirect('/home');
    }
}
