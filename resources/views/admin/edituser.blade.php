<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User</title>
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
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-group"></i> Home</a></li>
        <li>Manajemen User</li>
        <li class="active">Tambah User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/user/update/{{ $user->id }}">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
              <div class="box-body">
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" class="form-control" name="kode" placeholder="Input Kode Identitas" value="{{ $user->kode }}">
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control" name="password1" placeholder="Password">
                  <p>Jika tidak ingin mengubah password silahkan kosongkan saja!</p>
                  <input type="hidden" class="form-control" name="password2" value="{{ $user->password }}">
                </div>
                <div class="form-group">
                  <label>No. Telpon</label>
                  <input type="number" class="form-control" name="telpon" placeholder="Input Nomor Telpon" value="{{ $user->telpon }}">
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                    <select name="role" id="role" class="form-control" value="{{ $user->role }}">
                        @foreach ($role as $r)
                            <option @php if ($r==($user->role)) echo 'selected' @endphp>
                                {{ $r }}
                            </option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>