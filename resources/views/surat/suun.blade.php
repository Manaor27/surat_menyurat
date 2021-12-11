<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Undangan</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Undangan
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/suun/simpan">
          @csrf
          <div class="box-body">
            <div class="form-group">
              <label>Hal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Perihal" value="{{ old('perihal') }}" required>
            </div>
            <div class="form-group">
              <label>Kepada</label>
              <input type="text" class="form-control" name="kepada" placeholder="Kepada" value="{{ old('kepada') }}" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input id="keterangan" type="hidden" name="keterangan" required>
              <trix-editor input="keterangan"></trix-editor>
              @error('keterangan')
                <p class="text-danger"><b>Keterangan wajib diisi!</b></p>
              @enderror
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control pull-right" id="reservation" name="tanggal" min="<?php echo date('Y-m-d'); ?>" value="{{ old('tanggal') }}" required>
            </div>
            <div class="form-group">
              <label>Waktu</label>
              <input type="time" class="form-control timepicker" name="waktu" value="{{ old('waktu') }}" required>
            </div>
            <div class="form-group">
              <label>Tempat</label>
              <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" value="{{ old('tempat') }}" required>
            </div>
            <div class="form-group">
              <label>Penanda Tangan</label></br>
              <select name="pejabat" class="form-control select2" required>
                <option value="">-- Penanda Tangan --</option>
                @foreach($jabat as $jbt)
                  <option value="{{$jbt->id}}" @php if($jbt->id==old('pejabat')){echo 'selected';} @endphp>{{$jbt->nama}} ( {{$jbt->jabatan}} )</option>
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