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
              <input type="text" class="form-control" name="kode" placeholder="Input Kode Identitas" required>
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
              <label>Alamat Email</label>
              <input type="email" class="form-control" name="email" placeholder="Input email" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label>No. Telpon</label>
              <input type="text" class="form-control" name="telpon" placeholder="Input Nomor Telpon" required>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select name="role" id="role" class="form-control" required>
              @foreach ($role as $r)
                <option value="{{ $r }}">
                  {{ $r }}
                </option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat" placeholder="Input Tempat Lahir" required>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jekel" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Agama</label>
              <select name="agama" class="form-control" required>
                <option value="Kristen">Kristen</option>
                <option value="Islam">Islam</option>
                <option value="Katolik">Katolik</option>
                <option value="Buddha">Buddha</option>
                <option value="Hindu">Hindu</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="Input Alamat" required>
            </div>
            <div class="form-group">
              <label>Program Studi</label>
              <select name="prodi" class="form-control" required>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Informatika">Informatika</option>
              </select>
            </div>
            <div class="form-group">
              <label>Semester</label>
              <select name="semester" class="form-control" required>
                <option value="Gasal">Gasal</option>
                <option value="Genap">Genap</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tahun Akademik</label>
              <input type="text" class="form-control" name="periode" placeholder="Ex: 2019/2020" required>
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