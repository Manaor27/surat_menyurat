<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ $banyak_sutug }}</h3>

              <p>Surat Tugas</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/'. $sutug->id)}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $banyak_suket }}</h3>

              <p>Surat Kegiatan Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/'. $suket->id)}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $banyak_super }}</h3>

              <p>Surat Personalian & SK</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/'. $super->id)}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $banyak_suber }}</h3>

              <p>Surat Berita Acara</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/'. $suber->id)}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $banyak_suun }}</h3>

              <p>Surat Undangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/'. $suun->id)}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- BAR CHART -->
      <!--div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
          </div-->
          <!-- /.box -->
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Permohonan Masuk</h3>
            </div>
            <!-- /.box-header -->
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
                    <a class="btn btn-app bg-aqua" href="{{url('/admin/edit/'. $item->id)}}">
                      <i class="fa fa-edit"></i> Validasi
                    </a>
                    @if($item->surat->user->role=='admin')
                    <a class="btn btn-app bg-red" href="{{url('/admin/delete/'. $item->id_surat)}}">
                      <i class="fa fa-remove"></i> Hapus
                    </a>
                    @endif
                    <a class="btn btn-app bg-grey no-print" href="{{url('/admin/download/'. $item->id)}}" target="_blank">
                      <i class="fa fa-download"></i> Unduh
                    </a>
                  @endif
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- Modal Profile -->
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
                        <!-- the result to be displayed apply here -->
                    </h4>
                </div>
            </div>
        </div>
    </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>