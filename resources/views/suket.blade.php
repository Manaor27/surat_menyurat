<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Surat Keterangan</title>
  <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#jen').on('change', function () {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == 1){
          $('.project').remove();
          $("#suket").append('@if(Auth::user()->role=="admin")<div class="form-group"><label>Pemohon</label><select name="pengguna" class="form-control select2" style="width: 100%;" required><option value="0">-- Input Pemohon --</option>@foreach($pengguna as $us)<option value="{{$us->id}}">{{$us->kode}} ( {{$us->name}} )</option>@endforeach</select></div>@else<input type="hidden" class="form-control" name="pengguna" value="{{ Auth::user()->id }}">@endif<div class="form-group project"><label>Hal</label><input type="text" class="form-control" name="perihal" placeholder="Perihal" required></div><div class="form-group project"><label>Kepada</label><input type="text" class="form-control" name="kepada" placeholder="Kepada" required></div><div class="form-group project"><label>Keterangan</label><input id="keterangan" type="hidden" name="keterangan"><trix-editor input="keterangan"></trix-editor></div><div class="form-group project"><label>Tanggal</label><input type="date" class="form-control pull-right" id="reservation" name="tanggal" min="{{date("Y-m-d")}}" required></div><div class="form-group project"><label>Waktu</label><input type="time" class="form-control timepicker" name="waktu" required></div><div class="form-group project"><label>Tempat</label><input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" name="tempat" required></div>');
        }else{
          $('.project').remove();
          $("#suket").append('@if(Auth::user()->role=="admin")<div class="form-group"><label>Pemohon</label><select name="pengguna" class="form-control select2" style="width: 100%;" required><option value="0">-- Input Pemohon --</option>@foreach($user as $u)<option value="{{$u->id}}">{{$u->kode}} ( {{$u->name}} )</option>@endforeach</select></div>@else<input type="hidden" class="form-control" name="pengguna" value="{{ Auth::user()->id }}">@endif')
        }
      });
    });
  </script>
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Keterangan
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
          <div class="box-body" id="suket">
            <div class="form-group">
              <label>Jenis Surat</label>
              <select name="jenis" id="jen" class="form-control">
                <option value="1">Surat Keterangan Kegiatan Mahasiswa</option>
                @if(Auth::user()->role=='mahasiswa')
                <option value="2">Surat Keterangan Aktif Kuliah</option>
                @else
                <option value="2">Surat Keterangan Aktif</option>
                @endif
              </select>
            </div>
          @if(Auth::user()->role=='admin')
            <div class="form-group project">
              <label>Pemohon</label>
              <select name="pengguna" class="form-control select2" style="width: 100%;" required>
                <option value="0">-- Input Pemohon --</option>
                @foreach($pengguna as $us)
                <option value="{{$us->id}}">{{$us->kode}} ( {{$us->name}} )</option>
                @endforeach
              </select>
            </div>
          @else
            <input type="hidden" class="form-control" name="pengguna" value="{{ Auth::user()->id }}">
          @endif
            <div class="form-group project">
              <label>Hal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Perihal" required>
            </div>
            <div class="form-group project">
              <label>Kepada</label>
              <input type="text" class="form-control" name="kepada" placeholder="Kepada" required>
            </div>
            <div class="form-group project">
              <label>Keterangan</label>
              <input id="keterangan" type="hidden" name="keterangan">
              <trix-editor input="keterangan"></trix-editor>
            </div>
            <div class="form-group project">
              <label>Tanggal</label>
              <input type="date" class="form-control pull-right" id="reservation" name="tanggal" min="<?php echo date('Y-m-d'); ?>" required>
            </div>
            <div class="form-group project">
              <label>Waktu</label>
              <input type="time" class="form-control timepicker" name="waktu" required>
            </div>
            <div class="form-group project">
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