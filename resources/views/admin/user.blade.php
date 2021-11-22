<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manajemen User
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-group"></i> Beranda</a></li>
        <li class="active">Manajemen User</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-md-2">
                <a type="button" class="btn btn-block btn-success" href="/user/tambah"><p class="fa fa-plus"> Tambah User</p></a>
              </div>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>#</th>
                    <th>KODE</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>No. TELPON</th>
                    <th>JABATAN</th>
                    <th colspan="2">AKSI</th>
                  </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                @foreach($user as $u)
                <tbody>
                  <tr>
                      <td>{{ $no++ + (($user->currentPage()-1) * $user->perPage()) }}</td>
                    <td>{{ $u->kode }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->telpon }}</td>
                    <td>{{ $u->role }}</td>
                    <td>
                      <a class="btn btn-app bg-aqua" href="{{url('/user/edit/'. $u->id)}}">
                        <i class="fa fa-edit"></i> Ubah
                      </a>
                      <a class="btn btn-app bg-red" href="{{url('/user/delete/'. $u->id)}}">
                        <i class="fa fa-remove"></i> Hapus
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              {{ $user->links() }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
</body>
</html>