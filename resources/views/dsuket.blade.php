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

        .disp {
            text-align: center;
            margin: -.5rem 0;
        }
        .logodisp {
            float: left;
            position: relative;
            width: 80px;
            height: 80px;
            margin: .5rem 0 0 .5rem;
        }
    </style>
    <table>
        <tr>
            <td rowspan="4">
                <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="40" height="65"/>
            </td>
            <td rowspan="4">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr style="text-align: center;">
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
                    Jl. Dr. Wahidin Sudiro Husodo No. 5 – 25, Yogyakarta 55224<br>
                    Telp. 0274 – 563929 Fax. 0274 – 513235
                </font>
            </td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td>Nomor</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>: {{ $down->no_surat }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td>: {{ $down->surat->perihal }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Kepada Yth.</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td> &nbsp;</td>
        </tr>
        <tr>
            <td>{{ $down->surat->kepada }}</td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br>
    <br>
    <p style="line-height: 20px;">
        Dengan hormat,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $down->surat->keterangan }}
    </p>
    <table style="line-height: 20px;" align="center">
        <tr>
            <td>hari, tanggal</td>
            <td>&nbsp;&nbsp;</td>
            <td>: <?php echo date('l, d F Y', strtotime($down->surat->tanggal)); ?></td>
        </tr>
        <tr>
            <td>waktu</td>
            <td>&nbsp;&nbsp;</td>
            <td>: <?php echo date('H:i', strtotime($down->surat->waktu)); ?></td>
        </tr>
        <tr>
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
    <p style="text-align: right;">
        Yogyakarta, <?php echo date('d F Y'); ?>
    </p>
    <p align="right">
        <!--p style="text-align: center;"-->
            {{ $down->pejabat->jabatan }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            <u>{{ $down->pejabat->nama }}</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
            {{ $down->pejabat->nidn }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--/p-->
    </p>
</body>

</html>
