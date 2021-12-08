<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Surat</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#status').on('change', function () {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == "ditolak"){
          $('.remove').remove();
          $("#body").append('<div class="form-group remove"><label>Keterangan</label><input type="text" class="form-control" name="pesan" placeholder="Keterangan Ditolak" required></div>');
        }if(valueSelected == "disetujui"){
          $('.remove').remove();
          $("#body").append('<div class="form-group remove"><label>Penanda Tangan</label></br><select name="pejabat" class="form-control select2" required><option value="">-- Penanda Tangan --</option>@foreach($jabat as $jbt)<option value="{{$jbt->id}}">{{$jbt->nama}} ( {{$jbt->jabatan}} )</option>@endforeach</select></div>');
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
        Form Validasi Permohonan Surat
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/terkirim/update/{{ $info->id }}">
          @csrf
          @method('put')
          <input type="hidden" class="form-control" name="id" value="{{ $info->id }}">
          <div class="box-body" id="body">
            <div class="form-group">
              <label>Kepentingan Surat</label>
              <input type="text" class="form-control" name="perihal" placeholder="Kepada" value="{{ $info->surat->perihal }}" readonly>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" style="width: 100%;" id="status" required>
                @if($info->status=='sedang diproses')
                <option value="sedang diproses" selected>Sedang Diproses</option>
                <option value="disetujui">Disetujui</option>
                <option value="ditolak">Ditolak</option>
                @elseif($if->status=='disetujui')
                <option value="sedang diproses">Sedang Diproses</option>
                <option value="disetujui" selected>Disetujui</option>
                <option value="ditolak">Ditolak</option>
                @else
                <option value="sedang diproses">Sedang Diproses</option>
                <option value="disetujui">Disetujui</option>
                <option value="ditolak" selected>Ditolak</option>
                @endif
              </select>
            </div>
            @if($info->status=='disetujui')
            <div class="form-group remove">
              <label>Penanda Tangan</label></br>
              <select name="pejabat" class="form-control select2" required>
                <option value="">-- Penanda Tangan --</option>
                @foreach($jabat as $jbt)
                  <option value="{{$jbt->id}}">{{$jbt->nama}} ( {{$jbt->jabatan}} )</option>
                @endforeach
              </select>
            </div>
            @endif
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