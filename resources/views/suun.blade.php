<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Undangan</title>
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
        Surat Undangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Undangan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/suun/simpan">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Hal</label>
                  <input type="text" class="form-control" name="perihal" placeholder="Perihal" required>
                </div>
                <div class="form-group">
                  <label>Kepada</label>
                  <input type="text" class="form-control" name="kepada" placeholder="Kepada" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea placeholder="Isi Keterangan" class="textarea" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan" required></textarea>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control pull-right" id="reservation" name="tanggal" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                  <label>Waktu</label>
                  <input type="time" class="form-control timepicker" name="waktu" required>
                </div>
                <div class="form-group">
                  <label>Tempat</label>
                  <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" required>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>