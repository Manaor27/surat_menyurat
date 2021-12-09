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
        Data Permohonan Surat
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No. Surat</th>
                    <th>Tanggal</th>
                    <th>Kepentingan Surat</th>
                    <th>Pemohon</th>
                    <th>Bertanda Tangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                @php
                    $no = 1;
                    function tanggal_indo($tanggal, $cetak_hari = false){
                      $hari = array ( 1 =>    'Senin',
                                  'Selasa',
                                  'Rabu',
                                  'Kamis',
                                  'Jumat',
                                  'Sabtu',
                                  'Minggu'
                              );
                              
                      $bulan = array (1 =>   'Jan',
                                  'Feb',
                                  'Mar',
                                  'Apr',
                                  'Mei',
                                  'Jun',
                                  'Jul',
                                  'Agu',
                                  'Sep',
                                  'Okt',
                                  'Nov',
                                  'Des'
                              );
                      $split 	  = explode('-', $tanggal);
                      $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                      
                      if ($cetak_hari) {
                          $num = date('N', strtotime($tanggal));
                          return $hari[$num] . ', ' . $tgl_indo;
                      }
                      return $tgl_indo;
                  }
                @endphp
                <tbody>
                @foreach($tab as $tbl)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $tbl->no_surat }}</td>
                    @if($tbl->tanggal==null)
                    <td></td>
                    @else
                    <td><?php echo tanggal_indo(date('Y-m-d', strtotime($tbl->tanggal)), false) ?></td>
                    @endif
                    <td>{{ $tbl->surat->perihal }}</td>
                    <td>{{ $tbl->surat->user->name }}</td>
                    @if($tbl->id_pejabat==null)
                    <td></td>
                    @else
                    <td>{{ $tbl->pejabat->jabatan }}</td>
                    @endif
                    @if($tbl->status=='ditolak')
                    <td><span class="label bg-red">{{ $tbl->status }}</span></td>
                    @elseif($tbl->status=='sedang diproses')
                    <td><span class="label bg-yellow">{{ $tbl->status }}</span></td>
                    @else
                    <td><span class="label bg-green">{{ $tbl->status }}</span></td>
                    @endif
                    <td>
                      <a data-attr="{{url('/admin/preview/'. $tbl->id_surat)}}" class="btn btn-app bg-green" data-toggle="modal" id="mediumButton" data-target="#mediumModal">
                        <i class="fa fa-eye"></i> Pratinjau
                      </a>
                      @if($tbl->status=="sedang diproses")
                      <a class="btn btn-app bg-aqua" href="{{url('/terkirim/edit/'. $tbl->id)}}">
                        <i class="fa fa-edit"></i> Validasi
                      </a>
                      @elseif($tbl->status=="disetujui")
                      <a class="btn btn-app bg-grey no-print" href="{{url('/admin/download/'. $tbl->id)}}">
                        <i class="fa fa-download"></i> Unduh
                      </a>
                      @endif
                    </td>
                  </tr>
                  @if($tbl->pesan!=null && $tbl->status!='disetujui')
                  <tr>
                    <td></td>
                    <td colspan="5" class="text-danger"><b>Keterangan Ditolak : {{ $tbl->pesan }}</b></td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
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