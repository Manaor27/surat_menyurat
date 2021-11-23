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
    <font size="3" face="Times New Roman" class="element">
        <p style="text-align: justify;">
            Pada hari ini: {{ $down->surat->tanggal }} bertempat di {{ $down->surat->tempat }} telah dilangsungkan Kuliah Umum dengan tema: <i>"{{ $down->surat->perihal }}"</i> dengan mengundang pembicara yaitu {{ $down->surat->tamu }}. Acara ini diikuti oleh {{ $down->surat->target }}.
        </p>
        <p style="text-align: justify;">
            Adapun TOR acara, daftar kehadiran peserta, foto kegiatan seperti terlampir pada berita acara ini.
        </p>
        <p style="text-align: justify;">
            Demikian Berita Acara ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
        </p>
        <br>
        <center>
            Yogyakarta, <?php echo date('d F Y', strtotime($down->surat->tanggal)); ?>
            <br>
            Mengetahui
        </center>
        <table style="text-align: center;">
            <tr ><td>{{ $down->pejabat->jabatan }},</td></tr>
            <tr ><td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!}" /></td></tr>
            <tr ><td>({{ $down->pejabat->nama }})</td></tr>
        </table>
    </font>
</body>

</html>
