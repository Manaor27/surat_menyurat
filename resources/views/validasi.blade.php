<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Surat</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Form Validasi Permohonan Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Jenis Surat</li>
        <li class="active">Klasifikasi Surat</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/terkirim/update/{{ $info->id }}">
          @csrf
          @method('put')
          <input type="hidden" class="form-control" name="id" value="{{ $info->id }}">
          <div class="box-body">
            <div class="form-group">
              <label>Kepentingan Surat</label>
              <input type="text" class="form-control" name="perihal" placeholder="Kepada" value="{{ $info->surat->perihal }}" disabled>
            </div>
            <div class="form-group">
              <label>Penanda Tangan</label></br>
              <select name="pejabat" class="form-control select2" style="width: 100%;" required>
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