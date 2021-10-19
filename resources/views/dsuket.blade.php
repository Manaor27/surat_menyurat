<html>

<head>
    <title>LEMBAR DISPOSISI SURAT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }

        footer {
            position: fixed;
            bottom: -40px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 9pt;

            /** Extra personal styles **/
            text-align: center;
            line-height: 35px;
        }

        .line {
            line-height: 50%;
        }
    </style>
    <div class="row">
        <center class="line">
            <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="80">
            <h5>UNIVERSITAS KRISTEN DUTA WACANA</h5>
            <h4>FAKULTAS TEKNOLOGI INFORMASI</h4>
            <p>Jl. Dr. Wahidin Sudiro Husodo No. 5 – 25, Yogyakarta 55224 </p>
            <hr>
        </center>
    </div> 
    <table>
        <tr>
            <td>Nomor</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>: {{ $load->no_surat }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>: {{ $load->hal }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Kepada Yth.</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td> &nbsp;{{ $load->kepada }}</td>
        </tr>
    </table>
    <br>
    <br>
    <p style="line-height: 20px;">
        Dengan hormat,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $load->keterangan }}
    </p>
    <table style="line-height: 20px;">
        <tr>
            <td>hari, tanggal</td>
            <td>&nbsp;&nbsp;</td>
            <td>: <?php echo date('l, d F Y', strtotime($load->tanggal)); ?></td>
        </tr>
        <tr>
            <td>waktu</td>
            <td>&nbsp;&nbsp;</td>
            <td>: <?php echo date('H:i', strtotime($load->waktu)); ?></td>
        </tr>
        <tr>
            <td>tempat</td>
            <td>&nbsp;&nbsp;</td>
            <td>: {{ $load->tempat }}</td>
        </tr>
    </table>
    <br>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan dari kami. Atas perhatian dan kebijaksanaan Ibu/Bapak, kami mengucapkan terima kasih.
    </p>
    <br>
    <p style="text-align: right;">
        Yogyakarta, <?php echo date('d F Y'); ?>
    </p>
    <p align="right">
        <!--p style="text-align: center;"-->
            {{ $jabat->jabatan }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            <img src="{{ $jabat->ttd }}" style="height: 100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            <u>{{ $jabat->nama }}</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            {{ $jabat->nidn }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--/p-->
    </p>
</body>

</html>
