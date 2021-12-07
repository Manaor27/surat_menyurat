
<!DOCTYPE html>
<html>
<head>
  <!-- Meta -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Form Surat Tugas</title>
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
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/select2/dist/css/select2.min.css') }}">

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
      <a href="/home" class="logo">
        <span class="logo-mini"><b>SISM</b></span>
        <span class="logo-lg"><b>Surat Menyurat</b> FTI</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
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
              @if(Auth::user()->role=='mahasiswa')
              <li><a href="{{url('/mahasiswa/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas Kelompok</a></li>
              <li><a href="{{url('/mahasiswa/simpan/'. '0')}}"><i class="fa fa-circle-o"></i> Surat Tugas Pribadi</a></li>
              <li><a href="{{url('/mahasiswa/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Kegiatan Mahasiswa</a></li>
              @elseif(Auth::user()->role=='dosen')
              <li><a href="{{url('/dosen/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas Kelompok</a></li>
              <li><a href="{{url('/dosen/simpan/'. '0')}}"><i class="fa fa-circle-o"></i> Surat Tugas Pribadi</a></li>
              <li><a href="{{url('/dosen/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
              @else
              <li><a href="{{url('/admin/simpan/'. '4')}}"><i class="fa fa-circle-o"></i> Surat Tugas</a></li>
              <li><a href="{{url('/admin/simpan/'. '2')}}"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li>
              <li><a href="{{url('/admin/simpan/'. '1')}}"><i class="fa fa-circle-o"></i> Surat Personalia & SK</a></li>
              <li><a href="{{url('/admin/simpan/'. '5')}}"><i class="fa fa-circle-o"></i> Surat Berita Acara</a></li>
              <li><a href="{{url('/admin/simpan/'. '3')}}"><i class="fa fa-circle-o"></i> Surat Undangan</a></li>
              @endif
            </ul>
          </li>
          @if(Auth::user()->role=='admin')
          <li>
            <a href="/suratTerkirim">
              <i class="fa fa-reply"></i> <span>Terkirim</span>
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
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Surat Tugas
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <form role="form" method="POST" action="/sutug/simpan">
                @csrf
                <div class="box-body">
                  @if(Auth::user()->role=='admin')
                  <div class="form-group project">
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
                    <label>Tema</label>
                    <input type="text" class="form-control" name="tema" placeholder="Tema Kegiatan" required>
                  </div>
                  <div class="form-group">
                    <table class="table autocomplete_table" id="autocomplete_table">
                      <tbody>
                        <tr id="row_1">
                        @if(Auth::user()->role=='mahasiswa')
                          <td>
                            <label>NIM</label></br>
                            <input type="text" class="form-control autocomplete_txt ui-autocomplete-input" name="kode[]" placeholder="NIM" id='employee_search_1' value="{{ Auth::user()->kode }}" autocomplete="off" readonly>
                          </td>
                        @elseif(Auth::user()->role=='dosen')
                          <td>
                            <label>NIDN</label></br>
                            <input type="text" class="form-control autocomplete_txt" name="kode[]" placeholder="NIDN" id='employee_search_1' value="{{ Auth::user()->kode }}" autocomplete="off" readonly>
                          </td>
                        @else
                          <td>
                            <label>ID</label></br>
                            <input type="text" class="form-control autocomplete_txt" name="kode[]" placeholder="ID" id='employee_search_1' required>
                          </td>
                        @endif
                        @if(Auth::user()->role=='admin')
                          <td style="width: 500px">
                            <label>Nama</label></br>
                            <input type="text" class="form-control autocomplete_txt" name="nama[]" placeholder="Nama" id='employeeid_1' readonly>
                          </td>
                        @else
                          <td style="width: 500px">
                            <label>Nama</label></br>
                            <input type="text" class="form-control autocomplete_txt" name="nama[]" placeholder="Nama" id='employeeid_1' value="{{ Auth::user()->name }}" readonly>
                          </td>
                        @endif
                          <td >
                            <label for="">&nbsp;</label></br>
                            <button type="button" id="addNew" class="btn btn-success"><b>[+]</b>Tambah Anggota</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group">
                    <label>Penyelenggara Kegiatan</label>
                    <input type="text" class="form-control" id="reservation" name="penyelenggara" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" min="<?php echo date('Y-m-d'); ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" class="form-control" name="tempat" placeholder="Lokasi Kegiatan (Optional)">
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 RPL YFG.</strong> All rights
      reserved.
    </footer>
  </div>

  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('style/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('style/bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('style/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('style/dist/js/demo.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('style/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('.select2').select2()
      var rowcount, addBtn, tableBody, imgPath, basePath;

      addBtn = $("#addNew");
      rowcount = $("#autocomplete_table tbody tr").length+1;
      tableBody = $("#autocomplete_table tbody");
      imgPath = $("#imgPath").val();
      basePath = $("#base_path").val();

      function formHtml() {
        html = '<tr id="row_'+rowcount+'">';
        html += '<td>';
        html += '</br><input type="text" class="form-control autocomplete_txt ui-autocomplete-input" data-type="kode" name="kode[]" id="employee_search_'+rowcount+'" autocomplete="off" required>';
        html += '</td>';
        html += '<td>';
        html += '</br><input type="text" class="form-control" name="nama[]" id="employeeid_'+rowcount+'" data-type="name" readonly required>';
        html += '</td>';
        html += '<td id="delete_'+rowcount+' scope="row">';
        html += '</br><button type="button" class="btn btn-danger delete_row">[X]Hapus</button>';
        html += '</td>';
        html += '</tr>';
        rowcount++;
        return html;
      }

      function addNewRow() {
        var html = formHtml();
        console.log(html);
        tableBody.append(html);
      }

      function registrationEvents() {
        addBtn.on("click", addNewRow);
        $(document).on('click', '.delete_row', function () {
          $(this).parents('tr').remove();
        });
      }
      registrationEvents();
    });
  </script>
  <script type="text/javascript">
  $(document).on('focus','.autocomplete_txt',function(){
    type = $(this).data('type');
    $(this).autocomplete({
      minLength: 0,
      source: function( request, response ) {
          $.ajax({
            url:"{{route('getData')}}",
            dataType: "json",
            data: {
              type : type,
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
      },
      select: function (event, ui) {
        var data = ui.item.data;
        id_arr = $(this).attr('id');
        id = id_arr.split("_");
        elementId = id[id.length-1];
        $('#employee_search_'+elementId).val(ui.item.label);
        $('#employeeid_'+elementId).val(ui.item.value);
        return false;
      }
    });
  });
  </script>
</body>
</html>
