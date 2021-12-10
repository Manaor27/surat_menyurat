<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Berita Acara</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Berita Acara
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/suber/simpan">
        @csrf
          <div class="box-body">
            <div class="form-group">
              <label>Tema</label>
              <input type="text" class="form-control" name="tema" placeholder="Tema" required>
            </div>
            <div class="form-group">
              <label>Nama Mitra</label>
              <input type="text" class="form-control" name="kepada" placeholder="Nama Mitra" required>
            </div>
            <div class="form-group">
              <label>Tamu Pembicara</label>
              <input type="text" class="form-control" name="pembicara" placeholder="Tamu Pembicara" required>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control pull-right" id="reservation" name="tanggal" min="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group">
              <label>Sasaran Peserta</label>
              <input type="text" class="form-control" name="target" required>
            </div>
            <div class="form-group">
              <label>Tempat</label>
              <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" required>
            </div>
            <div class="form-group">
              <label>Penanda Tangan</label></br>
              <select name="pejabat" class="form-control select2" required>
                <option value="">-- Penanda Tangan --</option>
                @foreach($jabat as $jbt)
                  <option value="{{$jbt->id}}">{{$jbt->nama}} ( {{$jbt->jabatan}} )</option>
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