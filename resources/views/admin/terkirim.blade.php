<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Terkirim</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Terkirim
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No. Surat</th>
                    <th>Tanggal</th>
                    <th>Kepentingan Surat</th>
                    <th>Pemohon</th>
                    <th>Bertanda Tangan</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                @foreach($tab as $tbl)
                <tbody>
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $tbl->no_surat }}</td>
                    <td>{{ $tbl->tanggal }}</td>
                    <td>{{ $tbl->surat->perihal }}</td>
                    <td>{{ $tbl->surat->user->name }}</td>
                    @if($tbl->id_pejabat==null)
                    <td></td>
                    @else
                    <td>{{ $tbl->pejabat->jabatan }}</td>
                    @endif
                    @if($tbl->id_pejabat==null)
                    <td><span class="label bg-red">Belum Terkirim</span></td>
                    @else
                    <td><span class="label bg-green">Terkirim</span></td>
                    @endif
                    <td>
                      <a data-attr="{{url('/admin/preview/'. $tbl->id_surat)}}" class="btn btn-app bg-green" data-toggle="modal" id="mediumButton" data-target="#mediumModal">
                        <i class="fa fa-eye"></i> Pratinjau
                      </a>
                      @if($tbl->status!="disetujui" || $tbl->id_pejabat!=null)
                      <a class="btn btn-app bg-aqua" href="#" disabled>
                        <i class="fa fa-edit"></i> Ubah
                      </a>
                      @else
                      <a class="btn btn-app bg-aqua" href="{{url('/terkirim/edit/'. $tbl->id)}}">
                        <i class="fa fa-edit"></i> Ubah
                      </a>
                      @endif
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
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
                <!-- hasilnya disini -->
              </h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
</body>
</html>