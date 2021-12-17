<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Surat Personalia & SK</title>
  <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Personalia & SK
      </h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/super/simpan">
          @csrf
          <div class="box-body" id="super">
            <div class="form-group">
              <label>Jenis Surat</label>
              <select name="jenis" id="jenis" class="form-control">
                <option value="1" <?php if("1"==old('jenis')){echo 'selected';} ?>>Surat Keputusan</option>
                <option value="2" <?php if("2"==old('jenis')){echo 'selected';} ?>>Surat Personalia</option>
              </select>
            </div>
            @if(old('jenis')==null || old('jenis')==1)
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ old('perihal') }}" required>
            </div>
            <div class="form-group project">
              <label>Menimbang</label>
              <input id="menimbang" type="hidden" name="menimbang" required>
              <trix-editor input="menimbang"></trix-editor>
              @error("menimbang")
                <p class="text-danger"><b>Menimbang wajib diisi!</b></p>
              @enderror
            </div>
            <div class="form-group project">
              <label>Mengingat</label>
              <input id="mengingat" type="hidden" name="mengingat" required>
              <trix-editor input="mengingat"></trix-editor>
              @error("mengingat")
                <p class="text-danger"><b>Mengingat wajib diisi!</b></p>
              @enderror
            </div>
            <div class="form-group project">
              <label>Penetapan</label>
              <input id="keterangan" type="hidden" name="keterangan" required>
              <trix-editor input="keterangan"></trix-editor>
              @error("keterangan")
                <p class="text-danger"><b>Keterangan wajib diisi!</b></p>
              @enderror
            </div>
            @else
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ old('kepada') }}" required>
            </div>
            <div class="form-group project">
              <label>Kepada</label>
              <input type="text" class="form-control" name="kepada" placeholder="Kepada" value="{{ old('kepada') }}" required>
            </div>
            <div class="form-group project">
              <label>Keterangan</label>
              <input id="keterangan" type="hidden" name="keterangan">
              <trix-editor input="keterangan"></trix-editor>
              @error("keterangan")
                <p class="text-danger"><b>Keterangan wajib diisi!</b></p>
              @enderror
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