<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Tugas</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat Tugas
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Tugas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            @php
                @code = array();
                @name = array();
                @code = implode(',',$srt->kode);
                $name = implode(',',$srt->nama);
            @endphp
            @if(count($code)>1)
            <form role="form" method="POST" action="/sutug/simpan/{{ $srt->id }}">
                @csrf
                @method('put')
              <div class="box-body">
                <div class="form-group">
                  <label>Tema</label>
                  <input type="text" class="form-control" name="tema" placeholder="Tema Kegiatan" value="{{ $srt->perihal }}" required>
                </div>
                <div class="form-group">
                  <table class="table" id="dynamicAddRemove">
                    <tr>
                    @if(Auth::user()->role=='mahasiswa')
                      <td>
                        <label>NIM</label></br>
                        <input type="text" class="form-control" name="kode[]" placeholder="NIM" value="{{ Auth::user()->kode }}" disabled>
                      </td>
                    @elseif(Auth::user()->role=='dosen')
                      <td>
                        <label>NIDN</label></br>
                        <input type="text" class="form-control" name="kode[]" placeholder="NIDN" value="{{ Auth::user()->kode }}" disabled>
                      </td>
                    @else
                      <td>
                        <label>ID</label></br>
                        <input type="text" class="form-control" name="kode[]" placeholder="ID" required>
                      </td>
                    @endif
                      <td style="width: 500px">
                        <label>Nama</label></br>
                        <input type="text" class="form-control" name="nama[]" placeholder="Nama" value="{{ Auth::user()->name }}" disabled>
                      </td>
                      <td >
                        </br>
                        <button type="button" name="add" id="dynamic-ar" class="btn btn-success"><b>[+]</b>Tambah Anggota</button>
                      </td>
                    </tr>
                  </table>
                </div>
                <!--div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div-->
                <div class="form-group">
                  <label>Penyelenggara Kegiatan</label>
                  <input type="text" class="form-control" id="reservation" name="penyelenggara" required value="{{ $srt->penyelenggara }}">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" required value="{{ $srt->tanggal }}">
                </div>
                <div class="form-group">
                  <label>Tempat</label>
                  <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" required value="{{ $srt->tempat }}">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            @else
            @endif
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        $("#dynamicAddRemove").append('@if(Auth::user()->role=="mahasiswa")<div class="form-group col-md-3"><label>NIM</label><input type="text" class="form-control" name="kode[]" placeholder="NIM"></div>@elseif(Auth::user()->role=="dosen")<div class="form-group col-md-3"><label>NIDN</label><input type="text" class="form-control" name="kode[]" placeholder="NIM"></div>@else<div class="form-group col-md-3"><label>Kode</label><input type="text" class="form-control" name="kode[]" placeholder="Kode"></div>@endif<div class="form-group col-md-7"><label>Nama</label><input type="text" class="form-control" name="name[]" placeholder="Nama"></div><div class="form-group col-md-2"></br><button type="button" class="btn btn-danger remove-input-field">[X]Delete</button></div></div>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('div').remove();
    });
</script>
</html>