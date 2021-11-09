<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
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
            <a href="{{url('/mahasiswa/simpan/'. $suket->id)}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              @if($banyak_sutugk!=null)
              <h3>{{ $banyak_sutugk }}</h3>
              @else
              <h3>0</h3>
              @endif
              <p>Surat Tugas Kelompok</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/mahasiswa/simpan/'. $sutug->id)}}" class="small-box-footer" type="submit">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              @if($banyak_sutugp!=null)
              <h3>{{ $banyak_sutugp }}</h3>
              @else
              <h3>0</h3>
              @endif
              <p>Surat Tugas Pribadi</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/mahasiswa/simpan/'. 0)}}" class="small-box-footer" type="submit">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!--div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-grey"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Arsip</span>
              <span class="info-box-number">1,410</span>
            </div-->
            <!-- /.info-box-content -->
          <!--/div-->
          <!-- /.info-box -->
        <!--/div-->
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
            </div-->
            <!-- /.box-body -->
          <!--/div-->
          <!-- /.box -->
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Permohonan Surat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>No. Surat</th>
                  <th>Kepentingan Surat</th>
                  <th>Status</th>
                  <th>Action</th>
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
                  @elseif($item->status=='on process')
                  <td><span class="label bg-yellow">{{ $item->status }}</span></td>
                  @else
                  <td><span class="label bg-red">{{ $item->status }}</span></td>
                  @endif
                  <td>
                  @if($item->status=='on process')
                    <a class="btn btn-app bg-aqua" href="#" disabled>
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-app bg-red" href="#" disabled>
                      <i class="fa fa-remove"></i> Delete
                    </a>
                  @elseif($item->status=='disetujui')
                    @if($item->pejabat==null)
                    <a class="btn btn-app bg-aqua" href="#" disabled>
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-app bg-red" href="#" disabled>
                      <i class="fa fa-remove"></i> Delete
                    </a>
                    @else
                    <a class="btn btn-app bg-aqua" href="#" disabled>
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-app bg-red" href="#" disabled>
                      <i class="fa fa-remove"></i> Delete
                    </a>
                    <a class="btn btn-app bg-green" href="{{url('/mahasiswa/download/'. $item->inforid)}}">
                      <i class="fa fa-download"></i> Download
                    </a>
                    @endif
                  @else
                    <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/edit/'. $item->suratid)}}">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete/'. $item->suratid)}}">
                      <i class="fa fa-remove"></i> Delete
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
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>