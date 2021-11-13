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
        return view('s');
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
  
        if($search == ''){
            $employees = User::orderby('kode','asc')->select('kode','name')->limit(5)->get();
        }else{
            $employees = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($employees as $employee){
           $response[] = array("value"=>$employee->name,"label"=>$employee->kode);
        }
  
        return response()->json($response); 
     } 

    public function getCountries(Request $request){
        $name = $request->get('name');
        $fieldName = $request->get('fieldName');
        
        $name = strtolower(trim($name));
        if (empty($fieldName)) {
            $fieldName = 'name';
        }

        $countries = User::orderby('kode','asc')->select('kode','name')->where('kode', 'like', '%' .$name . '%')->limit(5)->get();
    }
}
