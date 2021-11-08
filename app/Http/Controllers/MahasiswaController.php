<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;
use App\Models\JenisSurat;
use App\Models\ManajemenSurat;
use App\Models\Pejabat;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suket = JenisSurat::find(2);
        $sutug = JenisSurat::find(4);
        $count_suket = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_user',Auth::id())->where('id_jenis',2)->get();
        $count_sutug = DB::table('surat')->select(DB::raw('count(id_jenis) as banyak'))->where('id_user',Auth::id())->where('id_jenis',4)->get();
        $tab = DB::table('informasi')->join('surat','id_surat','=','surat.id')->select(DB::raw('informasi.no_surat as no_surat, surat.perihal as tema, informasi.status as status, surat.id as suratid, informasi.id as inforid, informasi.id_pejabat as pejabat'))->where('surat.id_user',Auth::id())->get();
        foreach ($count_suket as $csuket) {
            $banyak_suket = $csuket->banyak;
        }
        foreach ($count_sutug as $csutug) {
            $banyak_sutug = $csutug->banyak;
        }
        return view('mahasiswa.home', compact('user','suket','sutug','banyak_suket','banyak_sutug','tab'));
    }

    public function smasuk()
    {
        //$user = Auth::user();
        return view('mahasiswa.smasuk');
    }

    public function simpan($id){
        if ($id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($id=='4'){
            return redirect("/suratTugas");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }

    public function edit($id) {
        $srt = DB::table('surat')->join('manajemen_surat','id_manajemen','=','manajemen_surat.id')->select(DB::raw('surat.id as id, surat.no_surat as no_surat ,surat.perihal as hal, surat.kepada as kepada, surat.keterangan as keterangan, surat.tanggal as tanggal, surat.waktu as waktu, surat.tempat as tempat, surat.kode as kode, surat.nama as nama, surat.penyelenggara as penyelenggara, surat.target as target, surat.tamu as tamu, manajemen_surat.id_jenis as jenis'))->where('surat.id',$id)->get();
        foreach ($srt as $sur) {
            if ($sur->jenis=='2') {
                return view('editsuket', compact('srt'));
            }
        }
    }

    public function download($id) {
        $down = Informasi::find($id);
        $jabat = Pejabat::find($load->pejabat);
        if ($down->surat->id_jenis=='2') {
            $pdf = PDF::loadview('dsuket', compact('down','jabat'));
            return $pdf->download('Surat Keterangan.pdf');
        }elseif ($down->surat->id_jenis=='4') {
            $pdf = PDF::loadview('dsutug', compact('down','jabat'));
            return $pdf->download('Surat Tugas.pdf');
        }
    }
}