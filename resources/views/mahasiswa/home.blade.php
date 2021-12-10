<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Beranda
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $count_sutug }}</h3>
              <p>Surat Tugas Kelompok</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/mahasiswa/simpan/'. 4)}}" class="small-box-footer" type="submit">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $count_sutugp }}</h3>
              <p>Surat Tugas Pribadi</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/mahasiswa/simpan/'. 0)}}" class="small-box-footer" type="submit">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $count_suket }}</h3>
              <p>Surat Keterangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/mahasiswa/simpan/'. 2)}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permohonan Surat</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No. Surat</th>
                    <th>Kepentingan Surat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                @foreach($tab as $tbl => $item)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td>{{ $item->tema }}</td>
                    @if($item->status=='disetujui')
                    <td><span class="label bg-green">{{ $item->status }}</span></td>
                    @elseif($item->status=='sedang diproses')
                    <td><span class="label bg-yellow">{{ $item->status }}</span></td>
                    @else
                    <td><span class="label bg-red">{{ $item->status }}</span></td>
                    @endif
                    <td>
                    @if($item->status=='ditolak')
                      <a class="btn btn-app bg-aqua" href="{{url('/mahasiswaEdit'.$item->suratid.$item->inforid)}}">
                        <i class="fa fa-edit"></i> Ubah
                      </a>
                      <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete/'. $item->suratid)}}">
                        <i class="fa fa-remove"></i> Hapus
                      </a>
                    @elseif($item->status=='disetujui')
                      @if($item->pejabat!=null)
                      <a class="btn btn-app bg-green" href="{{url('/mahasiswa/download/'. $item->inforid)}}">
                        <i class="fa fa-download"></i> Unduh
                      </a>
                      @endif
                    @endif
                    </td>
                  </tr>
                  @if($item->pesan!=null && $item->status!='disetujui')
                  <tr>
                    <td></td>
                    <td colspan="3" class="text-danger"><b>Keterangan Ditolak : {{ $item->pesan }}</b></td>
                  </tr>
                  @endif
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
</body>
</html>