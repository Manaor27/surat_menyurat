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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Keterangan</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/suket/update/{{ $srt->id }}">
          @csrf
          @method('put')
          <div class="box-body">
            @if($info->status=='perihal kurang jelas')
            <div class="form-group">
              <label>Hal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Perihal" value="{{ $srt->perihal }}" required>
            </div>
            @else
            <div class="form-group">
              <label>Hal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Perihal" value="{{ $srt->perihal }}" readonly>
            </div>
            @endif
            <div class="form-group">
              <label>Kepada</label>
              <input type="text" class="form-control" name="kepada" placeholder="Kepada" value="{{ $srt->kepada }}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Keterangan</label>
                <textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan" readonly>{{ $srt->keterangan }}</textarea>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control pull-right" id="reservation" name="tanggal" value="{{ $srt->tanggal }}" readonly>
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <input type="time" class="form-control timepicker" name="waktu" value="{{ $srt->waktu }}" readonly>
            </div>
            @if($info->status=='alamat kurang jelas')
            <div class="form-group">
              <label>Tempat</label>
              <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" name="tempat" value="{{ $srt->tempat }}" required>
            </div>
            @else
            <div class="form-group">
              <label>Tempat</label>
              <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" name="tempat" value="{{ $srt->tempat }}" readonly>
            </div>
            @endif
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
</body>
</html>