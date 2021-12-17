<html>
<head>
    <title>Surat Keterangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <table align="center">
        <tr>
            <td width="75px" style="text-align: center;">
                <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="70" height="85"/>
            </td>
            <td>
                <center>
                    <font size="4" class="letter5">
                        UNIVERSITAS KRISTEN DUTA WACANA
                    </font>
                    <br>
                    <font size="5">
                        <b>FAKULTAS TEKNOLOGI INFORMASI</b>
                    </font>
                    <br>
                    <font size="2">
                        Jl. Dr. Wahidin Sudiro Husodo No. 5 – 25, Yogyakarta 55224<br>
                        Telp. 0274 – 563929 Fax. 0274 – 513235
                    </font>
                </center>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="2"><hr></td>
        </tr>
    </table>
    @if($down->surat->kepada!=null)
    <br>
    <table>
        <tr>
            <td>Nomor</td>
            <td>&nbsp;</td>
            <td>: {{ $down->no_surat }}</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>&nbsp;</td>
            <td>: {{ $down->surat->perihal }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>&nbsp;</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Kepada Yth.</td>
            <td>&nbsp;</td>
            <td> &nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">{{ $down->surat->kepada }}</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br>
    <p style="line-height: 20px;">
        Dengan hormat,<br>
        <?php echo $down->surat->keterangan; ?>
    </p>
    @php
        function tanggal_indo($tanggal, $cetak_hari = false){
            $hari = array ( 1 =>    'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    );
                    
            $bulan = array (1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
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
    <br>
    <table style="line-height: 20px;">
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>hari, tanggal</td>
            <td>&nbsp;&nbsp;</td>
            <td>: <?php echo tanggal_indo(date('Y-m-d', strtotime($down->surat->tanggal)), true); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>waktu</td>
            <td>&nbsp;&nbsp;</td>
            <td>: <?php echo date('H:i', strtotime($down->surat->waktu)); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>tempat</td>
            <td>&nbsp;&nbsp;</td>
            <td>: {{ $down->surat->tempat }}</td>
        </tr>
    </table>
    <br>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan dari kami. Atas perhatian dan kebijaksanaan Ibu/Bapak, kami mengucapkan terima kasih.
    </p>
    <br>
    <table style="text-align: center;" align="right">
        <tr><td>Yogyakarta, <?php echo tanggal_indo(date('Y-m-d', strtotime($down->tanggal)), false); ?></td></tr>
        <tr><td>{{ $down->pejabat->jabatan }}</td></tr>
        <tr><td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($down->pejabat->nama)) !!}" /></td></tr>
        <tr><td><u>{{ $down->pejabat->nama }}</u></td></tr>
        <tr><td>{{ $down->pejabat->nidn }}</td></tr>
    </table>
    @else
    <center>
        @if($down->surat->user->role=='mahasiswa')
        <h5><b><u>SURAT KETERANGAN AKTIF KULIAH</u></b></h5>
        @else
        <h5><b><u>SURAT KETERANGAN AKTIF</u></b></h5>
        @endif
        <b>Nomor:{{$down->no_surat}}</b>
    </center>
    <br>
    <table>
        <tr>
           <td colspan="5">Yang bertanda tangan dibawah ini:</td> 
        </tr>
        <tr>
            <td rowspan="4"></td>
            <td>Nama</td>
            <td> : </td>
            <td>{{ $down->pejabat->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td> : </td>
            <td>{{ $down->pejabat->nidn }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td> : </td>
            <td>{{ $down->pejabat->jabatan }}</td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td> : </td>
            <td>Universitas Kristen Duta Wacana</td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">Dengan ini menerangkan bahwa :</td></tr>
        <tr>
            <td rowspan="6">&nbsp;</td>
            <td>Nama</td>
            <td> : </td>
            <td>{{ $down->surat->user->name }}</td>
        </tr>
        <tr>
            @if($down->surat->user->role=='mahasiswa')
            <td>NIM</td>
            @else
            <td>NIK</td>
            @endif
            <td> : </td>
            <td>{{ $down->surat->user->kode }}</td>
        </tr>
        @php
            function tanggal_indo($tanggal, $cetak_hari = false){
                $hari = array ( 1 =>    'Senin',
                            'Selasa',
                            'Rabu',
                            'Kamis',
                            'Jumat',
                            'Sabtu',
                            'Minggu'
                        );
                        
                $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
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
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td> : </td>
            <td>{{ $down->surat->user->tempat_lahir }}, <?php echo tanggal_indo(date('Y-m-d', strtotime($down->surat->user->tgl_lahir)), false); ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td> : </td>
            <td>{{ $down->surat->user->jekel }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td> : </td>
            <td>{{ $down->surat->user->agama }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td> : </td>
            <td>{{ $down->surat->user->alamat }}</td>
        </tr>
    </table>
    <br>
    <p style="text-align: justify;">Yang bersangkutan benar adalah {{ $down->surat->user->role }} {{ $down->surat->user->prodi }} Fakultas Teknologi Informasi Universitas Kristen Duta Wacana yang terdaftar pada Semester {{ $down->surat->user->semester }} Tahun Akademik {{ $down->surat->user->periode }}.</p>
    <p style="text-align: justify;">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    <br>
    <table>
        <tr>
            <td width="400px">&nbsp;</td>
            <td>Yogyakarta, <?php echo tanggal_indo(date('Y-m-d', strtotime($down->tanggal)), false); ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>{{ $down->pejabat->jabatan }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($down->pejabat->nama)) !!}" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>{{ $down->pejabat->nama }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>NIK: {{ $down->pejabat->nidn }}</td>
        </tr>
    </table>
    @endif
</body>

</html>
