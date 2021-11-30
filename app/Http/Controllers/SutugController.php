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
        return view('sutug');
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
            'id_user' => Auth::id(),
            'id_jenis' => '4'
        ]);
        $surat = DB::table('surat')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        Informasi::create([
            'no_surat' => null,
            'status' => 'sedang diproses',
            'tanggal' => date('Y-m-d'),
            'id_surat' => $id_srt,
            'id_pejabat' => null
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
    
    public function update($id, Request $request) {
        $skt = Surat::find($id);
        $skt->perihal = $request->perihal;
        $skt->kode = $request->kode;
        $skt->nama = $request->nama;
        $skt->tanggal = $request->tanggal;
        $skt->penyelenggara = $request->penyelenggara;
        $skt->tempat = $request->tempat;
        $skt->save();
        return redirect('/home');
    }
}
