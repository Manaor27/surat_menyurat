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
            <div class="form-group">
              <label>Pemohon</label>
              <select name="pengguna" class="form-control select2" style="width: 100%;" required>
                <option value="">-- Input Pemohon --</option>
                @foreach($user as $us)
                <option value="{{$us->id}}">{{$us->kode}} ( {{$us->name}} )</option>
                @endforeach
              </select>
            </div>
            @if(old('jenis')==null || old('jenis')==1)
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ old('kepada') }}" required>
            </div>
            <div class="form-group project">
              <table class="table autocomplete_table_1" id="autocomplete_table_1">
                <tbody>
                  <tr id="row_1">
                    <td style="width: 850px">
                      <label>Menimbang</label></br>
                      <input id="menimbang_1" type="hidden" name="menimbang[]" required>
                      <trix-editor input="menimbang_1"></trix-editor>
                      @error('menimbang[]')
                        <p class="text-danger"><b>Menimbang wajib diisi!</b></p>
                      @enderror
                    </td>
                    <td>
                      <label>&nbsp;</label>
                      <button type="button" name="add" id="addNew1" class="btn btn-success"><b>[+]</b>Tambah Pertimbangan</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group project">
              <table class="table autocomplete_table_2" id="autocomplete_table_2">
                <tbody>
                  <tr id="rows_1">
                    <td style="width: 850px">
                      <label>Mengingat</label></br>
                      <input id="mengingat_1" type="hidden" name="mengingat[]" required>
                      <trix-editor input="mengingat_1"></trix-editor>
                      @error('mengingat[]')
                        <p class="text-danger"><b>Mengingat wajib diisi!</b></p>
                      @enderror
                    </td>
                    <td>
                      <label>&nbsp;</label>
                      <button type="button" name="add" id="addNew2" class="btn btn-success"><b>[+]</b>Tambah Pengingat</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group project">
              <table class="table autocomplete_table_3" id="autocomplete_table_3">
                <tbody>
                  <tr id="baris_1">
                    <td style="width: 850px">
                      <label>Penetapan</label></br>
                      <input id="keterangan_1" type="hidden" name="keterangan[]" required>
                      <trix-editor input="keterangan_1"></trix-editor>
                      @error('keterangan[]')
                        <p class="text-danger"><b>Penetapan wajib diisi!</b></p>
                      @enderror
                    </td>
                    <td>
                      <label>&nbsp;</label>
                      <button type="button" name="add" id="addNew3" class="btn btn-success"><b>[+]</b>Tambah Penetapan</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <label>Penanda Tangan</label></br>
              <select name="pejabat" class="form-control select2" required>
                <option value="">-- Penanda Tangan --</option>
                @foreach($jabat as $jbt)
                  <option value="{{$jbt->id}}" <?php if($jbt->id==old('pejabat')){echo 'selected';} ?>>{{$jbt->nama}} ( {{$jbt->jabatan}} )</option>
                @endforeach
              </select>
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
            <div class="form-group">
              <label>Penanda Tangan</label>
              <select name="pejabat" class="form-control select2" required>
                <option value="">-- Penanda Tangan --</option>
                @foreach($jabat as $jbt)
                <option value="{{$jbt->id}}" <?php if($jbt->id==old('pejabat')){echo 'selected';} ?>>{{$jbt->nama}} ( {{$jbt->jabatan}} )</option>
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