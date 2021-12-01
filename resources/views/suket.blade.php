<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Keterangan</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Keterangan Kegiatan Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Keterangan</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/suket/simpan">
          @csrf
          <div class="box-body">
          @if(Auth::user()->role=='admin')
            <div class="form-group">
              <label>Pemohon</label>
              <select name="pengguna" class="form-control select2" style="width: 100%;" required>
                <option value="0">-- Input Pemohon --</option>
                @foreach($pengguna as $us => $u)
                <option value="{{$u->id}}">{{$u->kode}} ( {{$u->name}} )</option>
                @endforeach
              </select>
            </div>
          @else
            <input type="hidden" class="form-control" name="pengguna" value="{{ Auth::id() }}">
          @endif
            <div class="form-group">
              <label>Hal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Perihal" required>
            </div>
            <div class="form-group">
              <label>Kepada</label>
              <input type="text" class="form-control" name="kepada" placeholder="Kepada" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea placeholder="Isi Keterangan" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan" required></textarea>
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
              <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" name="tempat" required>
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