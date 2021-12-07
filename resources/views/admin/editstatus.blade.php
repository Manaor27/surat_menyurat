<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi</title>
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
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/admin/update/{{ $infor->id }}">
        @csrf
        @method('put')
          <input type="hidden" class="form-control" name="id" value="{{ $infor->id }}">
          <div class="box-body">
            <div class="form-group">
              <label>Nomor Surat</label>
              <input type="text" class="form-control" name="no_surat" placeholder="Perihal" value="{{ $infor->no_surat }}" disabled>
            </div>
            <div class="form-group">
              <label>Kepentingan Surat</label>
              <input type="text" class="form-control" name="perihal" placeholder="Kepada" value="{{ $infor->surat->perihal }}" disabled>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control select2" style="width: 100%;" required>
                <option value="{{ $infor->status }}">{{ $infor->status }}</option>
                <option value="disetujui">Disetujui</option>
                <option value="alamat kurang jelas">Alamat kurang jelas</option>
                <option value="perihal kurang jelas">Perihal kurang jelas</option>
                <option value="penyelenggara kurang lengkap">Penyelenggara kurang lengkap</option>
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