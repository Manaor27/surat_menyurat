<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User</title>
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
        Manajemen User
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-group"></i> Beranda</a></li>
        <li class="active">Manajemen User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="col-md-2">
              <a type="button" class="btn btn-block btn-success" href="/user/tambah"><p class="fa fa-plus"> Tambah User</p></a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                  <th>KODE</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>No. TELPON</th>
                  <th>JABATAN</th>
                  <th colspan="2">AKSI</th>
                </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                @foreach($user as $u)
                <tbody>
                <tr>
                    <td>{{ $no++ + (($user->currentPage()-1) * $user->perPage()) }}</td>
                  <td>{{ $u->kode }}</td>
                  <td>{{ $u->name }}</td>
                  <td>{{ $u->email }}</td>
                  <td>{{ $u->telpon }}</td>
                  <td>{{ $u->role }}</td>
                  <td>
                    <a class="btn btn-app bg-aqua" href="{{url('/user/edit/'. $u->id)}}">
                      <i class="fa fa-edit"></i> Ubah
                    </a>
                    <a class="btn btn-app bg-red" href="{{url('/user/delete/'. $u->id)}}">
                      <i class="fa fa-remove"></i> Hapus
                    </a>
                  </td>
                </tr>
                </tfoot>
                @endforeach
              </table>
              {{ $user->links() }}
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