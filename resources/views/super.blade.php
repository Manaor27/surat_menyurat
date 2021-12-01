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
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" required>
            </div>
            <div class="form-group project">
              <table class="table" id="dynamicRemove1">
                <tr>
                  <td style="width: 850px">
                    <label for="exampleInputPassword1">Menimbang</label></br>
                    <textarea placeholder="Isi Pertimbangan" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="menimbang[]" required></textarea>
                  </td>
                  <td>
                    <label>&nbsp;</label>
                    <button type="button" name="add" id="dynamic1" class="btn btn-success"><b>[+]</b>Tambah Pertimbangan</button>
                  </td>
                </tr>
              </table>
            </div>
            <div class="form-group project">
              <table class="table" id="dynamicRemove2">
                <tr>
                  <td style="width: 850px">
                    <label for="exampleInputPassword1">Mengingat</label></br>
                    <textarea placeholder="Isi Pengingat" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="mengingat[]" required></textarea>
                  </td>
                  <td>
                    <label>&nbsp;</label>
                    <button type="button" name="add" id="dynamic2" class="btn btn-success"><b>[+]</b>Tambah Pengingat</button>
                  </td>
                </tr>
              </table>
            </div>
            <div class="form-group project">
              <table class="table" id="dynamicRemove">
                <tr>
                  <td style="width: 850px">
                    <label for="exampleInputPassword1">Penetapan</label></br>
                    <textarea placeholder="Isi Keterangan" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan[]" required></textarea>
                  </td>
                  <td>
                    <label>&nbsp;</label>
                    <button type="button" name="add" id="dynamic" class="btn btn-success"><b>[+]</b>Tambah Penetapan</button>
                  </td>
                </tr>
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