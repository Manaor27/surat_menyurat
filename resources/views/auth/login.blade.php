<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('style/plugins/iCheck/square/blue.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition" style="background: url('{{ asset('black.jpg')}}'); background-size: cover;">
  <div class="login-box">
    <div class="login-logo">
      <p class="text-aqua"><b>Surat Menyurat</b> <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" style="width:60px;height:40px;"></p>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <form action="{{ route('login') }}" method="post">
      @csrf
        @error('kode')
            <div class="alert alert-danger">
              <h5><i class="icon fa fa-warning"></i> ID dan Password Salah!</h5>
            </div>
          @enderror
        <div class="form-group has-feedback">
          <input type="text" class="form-control @error('kode') is-invalid @enderror" placeholder="ID" name="kode" value="{{ old('kode') }}" required autocomplete="kode" autofocus>
          
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
            <div class="alert alert-danger alert-dismissible">
              <h4><i class="icon fa fa-warning"></i> Email dan Password Salah!</h4>
            </div>
          @enderror
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- jQuery 3 -->
  <script src="{{ asset('style/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('style/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- iCheck -->
  <script src="{{ asset('style/plugins/iCheck/icheck.min.js') }}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>