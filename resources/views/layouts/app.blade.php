<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Beranda</title>
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#jenis').on('change', function () {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == 1){
          $('.project').remove();
          $("#super").append('<div class="form-group project"><label>Menimbang</label><input id="menimbang" type="hidden" name="menimbang" required><trix-editor input="menimbang"></trix-editor>@error("menimbang")<p class="text-danger"><b>Menimbang wajib diisi!</b></p>@enderror</div><div class="form-group project"><label>Mengingat</label><input id="mengingat" type="hidden" name="mengingat" required><trix-editor input="mengingat"></trix-editor>@error("mengingat")<p class="text-danger"><b>Mengingat wajib diisi!</b></p>@enderror</div><div class="form-group project"><label>Penetapan</label><input id="keterangan" type="hidden" name="keterangan" required><trix-editor input="keterangan"></trix-editor>@error("keterangan")<p class="text-danger"><b>Keterangan wajib diisi!</b></p>@enderror</div>');
        }else{
          $('.project').remove();
          $("#super").append('<div class="form-group project"><label>Kepada</label><input type="text" class="form-control" name="kepada" placeholder="Kepada" required></div><div class="form-group project"><label>Keterangan</label><input id="keterangan" type="hidden" name="keterangan"><trix-editor input="keterangan"></trix-editor>@error("keterangan")<p class="text-danger"><b>Keterangan wajib diisi!</b></p>@enderror</div>');
        }
      });
    });
  </script>
  <link rel="stylesheet" type="text/css" href="trix.css">
  <script type="text/javascript" src="trix.js"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
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
              @if(Auth::user()->role=='admin')
              <li><a href="{{url('/admin/simpan/'. '1')}}"><i class="fa fa-circle-o"></i> Surat Personalia & SK</a></li>
              <li><a href="{{url('/admin/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
              <li><a href="{{url('/admin/simpan/'. '3')}}"><i class="fa fa-circle-o"></i> Surat Undangan</a></li>
              <li><a href="{{url('/admin/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas</a></li>
              <li><a href="{{url('/admin/simpan/'. '5')}}"><i class="fa fa-circle-o"></i> Surat Berita Acara</a></li>
              @elseif(Auth::user()->role=='mahasiswa')
              <li><a href="{{url('/mahasiswa/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas Kelompok</a></li>
              <li><a href="{{url('/mahasiswa/simpan/'. '0')}}"><i class="fa fa-circle-o"></i> Surat Tugas Pribadi</a></li>
              <li><a href="{{url('/mahasiswa/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
              @else
              <li><a href="{{url('/dosen/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas Kelompok</a></li>
              <li><a href="{{url('/dosen/simpan/'. '0')}}"><i class="fa fa-circle-o"></i> Surat Tugas Pribadi</a></li>
              <li><a href="{{url('/dosen/simpan/'. 2)}}" onclick="return confirm('Anda yakin ingin membuat surat Keterangan?')"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
              @endif
            </ul>
          </li>
          @if(Auth::user()->role=='admin')
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
          @endif
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <main>
      @yield('content')
    </main>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <h5>Apakah Anda ingin membuat Surat Keterangan Aktif?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
              <a href="{{url('/dosen/simpan/'. 2)}}" type="button" class="btn btn-primary">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
  </script>
  <script>
    $(document).ready(function(){
      $('.select2').select2()
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