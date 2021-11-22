<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah User</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manajemen User
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-group"></i> Manajemen User</a></li>
        <li class="active">Tambah User</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/user/simpan">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="kode" placeholder="Input Kode Identitas">
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label>Alamat Email</label>
              <input type="email" class="form-control" name="email" placeholder="Input email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label>No. Telpon</label>
              <input type="number" class="form-control" name="telpon" placeholder="Input Nomor Telpon">
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select name="role" id="role" class="form-control">
              @foreach ($role as $r)
                <option value="{{ $r }}">
                  {{ $r }}
                </option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
</body>
</html>