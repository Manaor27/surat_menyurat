<html>
<head>
    <title>Surat Undangan</title>
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
    <p style="text-align: right;">
        Yogyakarta, <?php tanggal_indo(date('Y-m-d', strtotime($down->tanggal)), false); ?>
    </p>
    <table>
        <tr>
            <td>Nomor </td>
            <td> : </td>
            <td> {{ $down->no_surat }}</td>
        </tr>
        <tr>
            <td>Hal </td>
            <td> : </td>
            <td> {{ $down->surat->perihal }}</td>
        </tr>
    </table>
    <br>
    <p>
        Kepada Yth. <br>
        {{ $down->surat->kepada }}
    </p>
    <p>Di Tempat</p>
    <p style="line-height: 20px;">
        Dengan hormat,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $down->surat->keterangan }}
    </p>
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat undangan ini telah kami sampaikan, kami mengharapkan kesediaan Bapak/Ibu untuk hadir dalam acara ini. Atas perhatiannya kami ucapkan terima kasih.
    </p>
    <br>
    <center>
        Hormat kami,
    </center>
    <table style="text-align: center;" align="left">
        <tr><td>{{ $down->pejabat->jabatan }}</td></tr>
        <tr><td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($down->pejabat->nama)) !!}" /></td></tr>
        <tr><td><u>{{ $down->pejabat->nama }}</u></td></tr>
        <tr><td>{{ $down->pejabat->nidn }}</td></tr>
    </table>
</body>

</html>
