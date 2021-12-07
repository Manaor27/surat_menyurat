<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah User</title>
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
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/user/update/{{ $user->id }}">
          @csrf
          @method('PUT')
          <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
          <div class="box-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="kode" placeholder="Input Kode Identitas" value="{{ $user->kode }}">
            </div>
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" placeholder="Input name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label>Alamat Email</label>
              <input type="email" class="form-control" name="email" placeholder="Input email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label>Password Baru</label>
              <input type="password" class="form-control" name="password1" placeholder="Password">
              <p>Jika tidak ingin mengubah password silahkan kosongkan saja!</p>
              <input type="hidden" class="form-control" name="password2" value="{{ $user->password }}">
            </div>
            <div class="form-group">
              <label>No. Telpon</label>
              <input type="number" class="form-control" name="telpon" placeholder="Input Nomor Telpon" value="{{ $user->telpon }}">
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select name="role" id="role" class="form-control" value="{{ $user->role }}">
              @foreach ($role as $r)
                <option @php if ($r==($user->role)) echo 'selected' @endphp>
                  {{ $r }}
                </option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat" placeholder="Input Tempat Lahir" value="{{ $user->tempat_lahir }}" required>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" name="tanggal" value="{{ $user->tgl_lahir }}" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jekel" class="form-control" required>
              @foreach ($jekel as $j)
                <option @php if ($j==($user->jekel)) echo 'selected' @endphp>
                  {{ $j }}
                </option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Agama</label>
              <select name="agama" class="form-control" required>
              @foreach ($agama as $a)
                <option @php if ($a==($user->agama)) echo 'selected' @endphp>
                  {{ $a }}
                </option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="Input Alamat" value="{{ $user->alamat }}" required>
            </div>
            <div class="form-group">
              <label>Program Studi</label>
              <select name="prodi" class="form-control" required>
              @foreach ($prodi as $p)
                <option @php if ($p==($user->prodi)) echo 'selected' @endphp>
                  {{ $p }}
                </option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Semester</label>
              <select name="semester" class="form-control" required>
              @foreach ($semester as $s)
                <option @php if ($s==($user->semester)) echo 'selected' @endphp>
                  {{ $s }}
                </option>
              @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tahun Akademik</label>
              <input type="text" class="form-control" name="periode" placeholder="Ex: 2019/2020" value="{{ $user->periode }}" required>
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