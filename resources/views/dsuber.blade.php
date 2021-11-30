<html>
<head>
    <title>Surat Berita Acara</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        .letter5 { 
            letter-spacing: 1px; 
        }
    </style>
    <table>
        <tr>
            <td width="60px">
                <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="60" height="80"/>
            </td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <font size="2" class="letter5">
                    UNIVERSITAS KRISTEN DUTA WACANA
                </font>
                <br>
                <font size="3">
                    <b>FAKULTAS TEKNOLOGI INFORMASI</b>
                </font>
                <br>
                <font size="1">
                    <li type="square" style="margin-left: 10px;"> PROGRAM STUDI INFORMATIKA
                    <li type="square" style="margin-left: 10px;"> PROGRAM STUDI SISTEM INFORMASI </li>
                </font>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <b><font size="5" face="Times New Roman">Berita Acara</font></b><br>
        <b>Kuliah Umum</b><br>
        <b><i>{{ $down->surat->perihal }}</i></b><br>
        Nomor: {{ $down->no_surat }}
    </center>
    <br>
    <br>
    <br>
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
    <font size="3" face="Times New Roman" class="element">
        <p style="text-align: justify;">
            Pada hari ini: {{ tanggal_indo($down->surat->tanggal,true) }} bertempat di {{ $down->surat->tempat }} telah dilangsungkan Kuliah Umum dengan tema: <i>"{{ $down->surat->perihal }}"</i> dengan mengundang pembicara yaitu {{ $down->surat->tamu }}. Acara ini diikuti oleh {{ $down->surat->target }}.
        </p>
        <p style="text-align: justify;">
            Adapun TOR acara, daftar kehadiran peserta, foto kegiatan seperti terlampir pada berita acara ini.
        </p>
        <p style="text-align: justify;">
            Demikian Berita Acara ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
        </p>
        <br>
        <center>
            Yogyakarta, <?php echo tanggal_indo(date('Y-m-d', strtotime($down->tanggal)), false); ?>
            <br>
            Mengetahui
        </center>
        <table style="text-align: center;">
            <tr>
                <td>{{ $down->pejabat->jabatan }},</td>
                <td width="350px">&nbsp;</td>
                <td>Perwakilan<br>{{ $down->surat->kepada }},</td>
            </tr>
            <tr>
                <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($down->pejabat->nama)) !!}" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>({{ $down->pejabat->nama }})</td>
                <td>&nbsp;</td>
                <td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
            </tr>
        </table>
    </font>
</body>

</html>
