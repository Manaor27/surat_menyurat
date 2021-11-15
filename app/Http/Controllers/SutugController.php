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
            'status' => 'on process',
            'tanggal' => date('Y-m-d'),
            'id_surat' => $id_srt,
            'id_pejabat' => null
        ]);
        return redirect("/home");
    }

    public function getEmployees(Request $request){
        $search = $request->search;
  
        if($search == '' && Auth::user()->role=='mahasiswa'){
            $employees = User::orderby('kode','asc')->select('kode','name')->where('role','mahasiswa')->limit(5)->get();
        }elseif($search != '' && Auth::user()->role=='mahasiswa'){
            $employees = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$search . '%')->where('role','mahasiswa')->limit(5)->get();
        }elseif($search == '' && Auth::user()->role=='dosen'){
            $employees = User::orderby('kode','asc')->select('kode','name')->where('role','dosen')->limit(5)->get();
        }elseif($search != '' && Auth::user()->role=='dosen'){
            $employees = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$search . '%')->where('role','dosen')->limit(5)->get();
        }
  
        $response = array();
        foreach($employees as $employee){
           $response[] = array("value"=>$employee->name,"label"=>$employee->kode);
        }
  
        return response()->json($response); 
     } 
}
