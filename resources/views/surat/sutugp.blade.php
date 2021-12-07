<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Tugas</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Tugas
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/sutug/simpan">
        @csrf
          <div class="box-body">
            <input type="hidden" class="form-control" name="pengguna" value="{{ Auth::user()->id }}">
            <div class="form-group">
              <label>Tema</label>
              <input type="text" class="form-control" name="tema" placeholder="Tema Kegiatan" required>
            </div>
            <div class="form-group">
            @if(Auth::user()->role=='mahasiswa')
              <label>NIM</label>
              <input type="text" class="form-control" name="kode[]" placeholder="NIM" value="{{ Auth::user()->kode }}" readonly>
            @elseif(Auth::user()->role=='dosen')
              <label>NIDN</label>
              <input type="text" class="form-control" name="kode[]" placeholder="NIDN" value="{{ Auth::user()->kode }}" readonly>
            @endif
            </div>
            <div class="form-group">
              <label>Nama</label></br>
              <input type="text" class="form-control" name="nama[]" placeholder="Nama" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="form-group">
              <label>Penyelenggara Kegiatan</label>
              <input type="text" class="form-control" id="reservation" name="penyelenggara" required>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" min="<?php echo date('Y-m-d'); ?>" required>
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
      </div>
    </section>
  </div>
@endsection
</body>
</html>