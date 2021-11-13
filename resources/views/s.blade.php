
<!DOCTYPE html>
<html>
<head>
  <!-- Meta -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
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

    <!-- CSS -->
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SISM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Surat Menyurat</b> FTI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <p class="fa fa-user"></p>
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
                  @if(Auth::user()->role=='dosen')
                    NIDN &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{ Auth::user()->kode }}<br/>
                  @elseif(Auth::user()->role=='admin')
                    Kode &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{ Auth::user()->kode }}<br/>
                  @else
                    NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{ Auth::user()->kode }}<br/>
                  @endif
                  Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{ Auth::user()->name }}<br/>
                  Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{ Auth::user()->email }}<br/>
                  No. Telpon: {{ Auth::user()->telpon }}
                </p>
                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"><b>Sign out</b></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('style/dist/img/icon.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--li class="header">MAIN NAVIGATION</li-->
        <li class="active">
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-send"></i> <span>Jenis Surat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->role=='admin')
            <li><a href="{{url('/admin/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas</a></li>
            <li><a href="{{url('/admin/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Kegiatan Mahasiswa</a></li>
            <li><a href="{{url('/admin/simpan/'. '1')}}"><i class="fa fa-circle-o"></i> Surat Personalia & SK</a></li>
            <li><a href="{{url('/admin/simpan/'. '5')}}"><i class="fa fa-circle-o"></i> Surat Berita Acara</a></li>
            <li><a href="{{url('/admin/simpan/'. '3')}}"><i class="fa fa-circle-o"></i> Surat Undangan</a></li>
            @elseif(Auth::user()->role=='mahasiswa')
            <li><a href="{{url('/mahasiswa/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas</a></li>
            <li><a href="{{url('/mahasiswa/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Kegiatan Mahasiswa</a></li>
            @else
            <li><a href="{{url('/dosen/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas</a></li>
            <li><a href="{{url('/dosen/simpan/'. '1')}}"><i class="fa fa-circle-o"></i> Surat Personalia & SK</a></li>
            @endif
          </ul>
        </li>
        <!--li>
          <a href="/suratMasuk">
            <i class="fa fa-inbox"></i> <span>Surat Masuk</span>
          </a>
        </li-->
        @if(Auth::user()->role=='admin')
        <!--li>
          <a href="/klasifikasi">
            <i class="fa fa-file-text"></i> <span>Klasifikasi Surat</span>
          </a>
        </li-->
        <li>
          <a href="/suratTerkirim">
            <i class="fa fa-reply"></i> <span>Terkirim</span>
          </a>
        </li>
        <!--li>
          <a href="/user">
            <i class="fa fa-group"></i> <span>Manajemen User</span>
          </a>
        </li-->
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

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
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/sutug/simpan">
                <div class="box-body">
                    <div class="form-group">
                    <label>Tema</label>
                    <input type="text" class="form-control" name="tema" placeholder="Tema Kegiatan" required>
                    </div>
                    <div class="form-group">
                    <table class="table" id="dynamicAddRemove">
                        <tr>
                        @if(Auth::user()->role=='mahasiswa')
                        <td>
                            <label>NIM</label></br>
                            <input type="text" class="form-control" name="kode[]" placeholder="NIM" id='employee_search'>
                        </td>
                        @elseif(Auth::user()->role=='dosen')
                        <td>
                            <label>NIDN</label></br>
                            <input type="text" class="form-control" name="kode[]" placeholder="NIDN" value="{{ Auth::user()->kode }}" readonly>
                        </td>
                        @else
                        <td>
                            <label>ID</label></br>
                            <input type="text" class="form-control" name="kode[]" placeholder="ID" required>
                        </td>
                        @endif
                        <td style="width: 500px">
                            <label>Nama</label></br>
                            <input type="text" class="form-control" name="nama[]" placeholder="Nama" id='employeeid' readonly>
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
                    <input type="text" class="form-control" id="reservation" name="penyelenggara" required>
                    </div>
                    <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan" required>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 RPL YFG.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('style/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('style/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('style/dist/js/demo.js') }}"></script>
<script type="text/javascript">
    $("#dynamic-ar").click(function () {
        $("#dynamicAddRemove").append('<tr>@if(Auth::user()->role=="mahasiswa")<td><label>NIM</label></br><input type="text" class="form-control ui-autocomplete-input" name="kode[]" placeholder="NIM" id="employee_search" autocomplete="off"></td>@elseif(Auth::user()->role=="dosen")<td><label>NIDN</label></br><input type="text" class="form-control" name="kode[]" placeholder="NIDN"></td>@else<td><label>Kode</label></br><input type="text" class="form-control" name="kode[]" placeholder="Kode"></td>@endif<td style="width: 500px"><label>Nama</label></br><input type="text" class="form-control" name="nama[]" placeholder="Nama" id="employeeid" readonly></td><td></br><button type="button" class="btn btn-danger remove-input-field">[X]Delete</button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<!-- Script -->
<script type="text/javascript">

// CSRF Token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){

  $( "#employee_search" ).autocomplete({
     source: function( request, response ) {
        // Fetch data
        $.ajax({
          url:"{{route('getEmployees')}}",
          type: 'post',
          dataType: "json",
          data: {
             _token: CSRF_TOKEN,
             search: request.term
          },
          success: function( data ) {
             response( data );
          }
        });
     },
     select: function (event, ui) {
       // Set selection
       $('#employee_search').val(ui.item.label); // display the selected text
       $('#employeeid').val(ui.item.value); // save selected id to input
       return false;
     }
  });

});
</script>
</body>
</html>
