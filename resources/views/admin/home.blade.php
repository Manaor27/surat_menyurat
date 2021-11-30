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
      <ol class="breadcrumb">
        <li class="active"><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ $banyak_sutug }}</h3>
              <p>Surat Tugas</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/4')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $banyak_suket }}</h3>
              <p>Surat Kegiatan Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/2')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $banyak_super }}</h3>
              <p>Surat Personalian & SK</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/1')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $banyak_suber }}</h3>
              <p>Surat Berita Acara</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/5')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $banyak_suun }}</h3>
              <p>Surat Undangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/3')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Permohonan Masuk</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No Surat</th>
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
                    <td>{{ $item->surat->perihal }}</td>
                    @if($item->status=='disetujui')
                    <td><span class="label bg-green">{{ $item->status }}</span></td>
                    @elseif($item->status=='sedang diproses')
                    <td><span class="label bg-yellow">{{ $item->status }}</span></td>
                    @else
                    <td><span class="label bg-red">{{ $item->status }}</span></td>
                    @endif
                    <td>
                    @if($item->id_pejabat==null)
                      <a data-attr="{{url('/admin/preview/'. $item->id_surat)}}" class="btn btn-app bg-green" data-toggle="modal" id="mediumButton" data-target="#mediumModal">
                        <i class="fa fa-eye"></i> Pratinjau
                      </a>
                      @if($item->status!='disetujui')
                      <a class="btn btn-app bg-aqua" href="{{url('/admin/edit/'. $item->id)}}">
                        <i class="fa fa-edit"></i> Validasi
                      </a>
                      @if($item->surat->user->role=='admin')
                      <a class="btn btn-app bg-red" href="{{url('/admin/delete/'. $item->id_surat)}}">
                        <i class="fa fa-remove"></i> Hapus
                      </a>
                      @endif
                      @endif
                    @else
                      @if($item->status!='disetujui')
                        <a data-attr="{{url('/admin/preview/'. $item->id_surat)}}" class="btn btn-app bg-green" data-toggle="modal" id="mediumButton" data-target="#mediumModal">
                          <i class="fa fa-eye"></i> Pratinjau
                        </a>
                        <a class="btn btn-app bg-aqua" href="{{url('/admin/edit/'. $item->id)}}">
                          <i class="fa fa-edit"></i> Validasi
                        </a>
                        @if($item->surat->user->role=='admin')
                        <a class="btn btn-app bg-red" href="{{url('/admin/delete/'. $item->id_surat)}}">
                          <i class="fa fa-remove"></i> Hapus
                        </a>
                        @endif
                        @else
                        <a data-attr="{{url('/admin/preview/'. $item->id_surat)}}" class="btn btn-app bg-green" data-toggle="modal" id="mediumButton" data-target="#mediumModal">
                          <i class="fa fa-eye"></i> Pratinjau
                        </a>
                        <a class="btn btn-app bg-grey no-print" href="{{url('/admin/download/'. $item->id)}}">
                          <i class="fa fa-download"></i> Unduh
                        </a>
                      @endif
                    @endif
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Tampilan Data</h3>
              </div>
            <div class="modal-body">
              <h4 id="mediumBody">
                <!-- hasil disini -->
              </h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
</body>
</html>