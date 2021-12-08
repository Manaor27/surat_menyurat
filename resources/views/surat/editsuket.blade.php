<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat Keterangan</title>
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
        <small>Control panel</small>
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/suket/update/{{ $srt->id }}/{{ $info->id }}">
          @csrf
          @method('put')
          <div class="box-body">
            <div class="form-group">
              <label>Hal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Perihal" value="{{ $srt->perihal }}" required>
            </div>
            <div class="form-group">
              <label>Kepada</label>
              <input type="text" class="form-control" name="kepada" placeholder="Kepada" value="{{ $srt->kepada }}" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input id="keterangan" type="hidden" name="keterangan" value="{{ $srt->keterangan }}" required>
              <trix-editor input="keterangan"></trix-editor>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control pull-right" id="reservation" name="tanggal" value="{{ $srt->tanggal }}" required>
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <input type="time" class="form-control timepicker" name="waktu" value="{{ $srt->waktu }}" required>
            </div>
            <div class="form-group">
              <label>Tempat</label>
              <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" name="tempat" value="{{ $srt->tempat }}" required>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
</body>
</html>