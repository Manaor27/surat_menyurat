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
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Personalia & SK</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/super/simpan">
          @csrf
          <div class="box-body" id="super">
            <div class="form-group">
              <label>Jenis Surat</label>
              <select name="jenis" id="jenis" class="form-control">
                <option value="1">Surat Keputusan</option>
                <option value="2">Surat Personalia</option>
              </select>
            </div>
            @if(Auth::user()->role=='admin')
            <div class="form-group">
              <label>Pemohon</label>
              <select name="pengguna" class="form-control select2" style="width: 100%;" required>
                <option value="0">-- Input Pemohon --</option>
                @foreach($user as $us)
                <option value="{{$us->id}}">{{$us->kode}} ( {{$us->name}} )</option>
                @endforeach
              </select>
            </div>
            @else
            <input type="hidden" class="form-control" name="pengguna" value="{{ Auth::user()->id }}">
            @endif
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" required>
            </div>
            <div class="form-group project">
              <table class="table autocomplete_table_1" id="autocomplete_table_1">
                <tbody>
                  <tr id="row_1">
                    <td style="width: 850px">
                      <label>Menimbang</label></br>
                      <input id="menimbang_1" type="hidden" name="menimbang[]">
                      <trix-editor input="menimbang_1"></trix-editor>
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
                      <input id="mengingat_1" type="hidden" name="mengingat[]">
                      <trix-editor input="mengingat_1"></trix-editor>
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
                      <input id="keterangan_1" type="hidden" name="keterangan[]">
                      <trix-editor input="keterangan_1"></trix-editor>
                    </td>
                    <td>
                      <label>&nbsp;</label>
                      <button type="button" name="add" id="addNew3" class="btn btn-success"><b>[+]</b>Tambah Penetapan</button>
                    </td>
                  </tr>
                </tbody>
              </table>
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