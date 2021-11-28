<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Personalia & SK</title>
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
        Surat Personalia & SK
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Personalia & SK</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/super/update/{{ $srt->id }}">
                @csrf
                @method('PUT')
              <div class="box-body">
              @if($info->status='perihal kurang jelas')
                <div class="form-group">
                  <label>Perihal</label>
                  <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ $srt->perihal }}" required>
                </div>
              @else
                <div class="form-group">
                  <label>Perihal</label>
                  <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ $srt->perihal }}" readonly>
                </div>
              @endif
              @php
                $ket = array();
                $ket = explode(',', $srt->keterangan);
              @endphp
                <div class="form-group">
                    <table class="table" id="dynamicRemove">
                    @foreach($ket as $key => $value)
                        <tr>
                            <td style="width: 850px">
                                <label for="exampleInputPassword1">Keterangan</label></br>
                                <textarea placeholder="Place some text here" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan[]" required>{{ $ket[$key] }}</textarea>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
<script type="text/javascript">
    $("#dynamic").click(function () {
        $("#dynamicRemove").append('<tr><td style="width: 300px"><label for="exampleInputPassword1">Keterangan</label></br><textarea placeholder="Place some text here"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td><td></br><button type="button" name="add" id="dynamic" class="btn btn-success"><b>[+]</b>Tambah Penetapan</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>