<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
      <a href="/home" class="logo">
        <span class="logo-mini"><b>SISM</b></span>
        <span class="logo-lg"><b>Surat Menyurat</b> <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" style="width:30px;height:25px;"></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
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
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat"><b>Keluar</b></a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('style/dist/img/icon.png') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="active">
            <a href="/home">
              <i class="fa fa-dashboard"></i> <span>Beranda</span>
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
              <li><a href="{{url('/admin/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas</a></li>
              <li><a href="{{url('/admin/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
              <li><a href="{{url('/admin/simpan/'. '1')}}"><i class="fa fa-circle-o"></i> Surat Personalia & SK</a></li>
              <li><a href="{{url('/admin/simpan/'. '5')}}"><i class="fa fa-circle-o"></i> Surat Berita Acara</a></li>
              <li><a href="{{url('/admin/simpan/'. '3')}}"><i class="fa fa-circle-o"></i> Surat Undangan</a></li>
            </ul>
          </li>
          <li>
            <a href="/suratTerkirim">
              <i class="fa fa-envelope"></i> <span>Data Permohonan Surat</span>
            </a>
          </li>
          <li>
            <a href="/arsipSurat">
              <i class="fa fa-envelope-square"></i> <span>Arsip Surat</span>
            </a>
          </li>
          <li>
            <a href="/user">
              <i class="fa fa-group"></i> <span>Manajemen User</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Beranda
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{ $count_sutug }}</h3>
              <p>Surat Tugas</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/4')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $count_suket }}</h3>
              <p>Surat Keterangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/2')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $count_super }}</h3>
              <p>Surat Personalian & SK</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/1')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $count_suber }}</h3>
              <p>Surat Berita Acara</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/5')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $count_suun }}</h3>
              <p>Surat Undangan</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/admin/simpan/3')}}" class="small-box-footer">Isi Form <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Bar Chart</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body chart-responsive">
                  <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title">Tampilan Data</h3>
              </div>
            <div class="modal-body">
              <h4 id="mediumBody">
                <!-- hasil disini -->
              </h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
      <strong>Copyright &copy; 2021 RPL YFG.</strong> All rights
      reserved.
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
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
  <!-- AdminLTE App -->
  <script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('style/dist/js/pages/dashboard.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('style/dist/js/demo.js') }}"></script>
  <script src="{{ asset('style/bower_components/morris.js/morris.min.js') }}"></script>
    <script>
      $(function () {
        "use strict";
        var bar = new Morris.Bar({
        element: 'bar-chart',
        resize: true,
        data: [
          {y: 'Surat Tugas', a: <?php echo $count_sutug; ?>},
          {y: 'Surat Keterangan', a: <?php echo $count_suket; ?>},
          {y: 'Surat Personalia & SK', a: <?php echo $count_super; ?>},
          {y: 'Surat Berita Acara', a: <?php echo $count_suber; ?>},
          {y: 'Surat Undangan', a: <?php echo $count_suun; ?>}
        ],
        barColors: ['#00C0EF'],
        xkey: 'y',
        ykeys: ['a'],
        hideHover: 'auto'
      });
    });
  </script>
</body>
</html>