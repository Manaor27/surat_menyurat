<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah User</title>
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
        <li><a href="/"><i class="fa fa-group"></i> Beranda</a></li>
        <li>Manajemen User</li>
        <li class="active">Tambah User</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/user/update/{{ $user->id }}">
          @csrf
          @method('PUT')
          <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
          <div class="box-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="kode" placeholder="Input Kode Identitas" value="{{ $user->kode }}">
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Input name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label>Alamat Email</label>
              <input type="email" class="form-control" name="email" placeholder="Input email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label>Password Baru</label>
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
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
</body>
</html>