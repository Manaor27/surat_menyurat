<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;
use App\Models\Informasi;
use App\Models\Pejabat;
use App\Models\Surat;
use Auth;
use PDF;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $count_super = DB::table('surat')->where('id_jenis',1)->count();
        $count_sutug = DB::table('surat')->where('id_jenis',4)->count();
        $count_suket = DB::table('surat')->where('id_jenis',2)->count();
        $count_suun = DB::table('surat')->where('id_jenis',3)->count();
        $count_suber = DB::table('surat')->where('id_jenis',5)->count();
        $tab = Informasi::where('status','=','disetujui')->count();
        $tab2 = Informasi::where('status','!=','disetujui')->count();
        return view('admin.home', compact('user','count_super','count_suket','count_suun','count_sutug','count_suber','tab','tab2'));
    }

    public function simpan($id){
        if ($id=='1') {
            return redirect("/suratPersonalia");
        }elseif ($id=='4'){
            return redirect("/suratTugas");
        }elseif ($id=='2') {
            return redirect("/suratKeterangan");
        }elseif ($id=='3') {
            return redirect("/suratUndangan");
        }elseif ($id=='5') {
            return redirect("/suratBerita");
        }
    }

    public function delete($id) {
        $srt = DB::table('surat')->where('id',$id);
        $srt->delete();
        return redirect('/home');
    }

    public function preview(Request $request,$id) {
        $pre = Surat::find($id);
        return view('admin.show', compact('pre'))->renderSections()['content'];
    }

    public function download($id) {
        $down = Informasi::find($id);
        if ($down->surat->id_jenis=='2') {
            $pdf = PDF::loadview('download.dsuket', compact('down'));
            return $pdf->download('Surat Keterangan.pdf');
        }elseif ($down->surat->id_jenis=='4') {
            $pdf = PDF::loadview('download.dsutug', compact('down'));
            return $pdf->download('Surat Tugas.pdf');
        }elseif ($down->surat->id_jenis=='1') {
            $pdf = PDF::loadview('download.dsuper', compact('down'));
            return $pdf->download('Surat Personalia.pdf');
        }elseif ($down->surat->id_jenis=='5') {
            $pdf = PDF::loadview('download.dsuber', compact('down'));
            return $pdf->download('Surat Berita Acara.pdf');
        }else {
            $pdf = PDF::loadview('download.dsuun', compact('down'));
            return $pdf->download('Surat Undangan.pdf');
        }
    }

    public function arsip() {
        $tab = Informasi::all();
        return view('admin.arsip', compact('tab'));
    }

    public function laporan() {
        $tab = Informasi::all();
        return view('admin.laporan', compact('tab'));
    }
}
