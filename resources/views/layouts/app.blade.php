<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('style/plugins/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/select2/dist/css/select2.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <p class="fa fa-user"></p>
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
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
      <!-- /.search form -->
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
  <main>
        @yield('content')
    </main>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 RPL YFG.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="{{ asset('style/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('style/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- jQuery 3 -->
<script src="{{ asset('style/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('style/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('style/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('style/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('style/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('style/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('style/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('style/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('style/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('style/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('style/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('style/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('style/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('style/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('style/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('style/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('style/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('style/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('style/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('style/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('style/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- page script -->
<script>
  $(function () {
    $('.select2').select2()
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#95A8BF', '#96CEE7'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
</script>
<script type="text/javascript">
    $("#dynamic").click(function () {
        $("#dynamicRemove").append('<tr><td style="width: 850px"></br><textarea placeholder="Place some text here"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan[]"></textarea></td><td></br><button type="button" class="btn btn-danger remove-field">[X]Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script>
  $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>
</body>
</html>