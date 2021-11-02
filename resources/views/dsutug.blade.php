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
        .letter5 { 
            letter-spacing: 1px; 
        }
        .element { 
            margin: 15 px 20px;
        }
    </style>
    <table>
        <tr>
            <td rowspan="4">
                <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="55" height="75"/>
            </td>
            <td rowspan="4">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <font size="2" class="letter5">
                    UNIVERSITAS KRISTEN DUTA WACANA
                </font>
                <br>
                <font size="3">
                    <b>FAKULTAS TEKNOLOGI INFORMASI</b>
                </font>
                <br>
                <font size="2">
                    &#9744; &nbsp;PROGRAM STUDI INFORMATIKA<br>
                    &#9744; &nbsp;PROGRAM STUDI SISTEM INFORMASI
                </font>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <u><b><font size="4" face="Times New Roman">SURAT TUGAS</font></b></u><br>
        Nomor: {{ $load->no_surat }}
    </center>
    <br>
    <br>
    <br>
    <font size="3" face="Times New Roman" class="element">
        <p style="text-align: justify;">
            Dengan ini {{ $jabat->jabatan }} Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta memberikan tugas kepada para {{ Auth::user()->role }} tersebut di bawah ini:
        </p>
        <table border="1" align="center">
            <thead>
                <tr style="text-align: center;">
                    <td width="50px">No.</td>
                    <td width="350px">Nama</td>
                    <td width="200px">NIM</td>
                </tr>
            </thead>
            @php
                $no = 1;
                $name = array();
                $name = explode(',', $load->nama);
                $code = array();
                $code = explode(',', $load->kode);
            @endphp
            @foreach($name as $key => $value)
            <tbody>
                <tr>
                    <td style="text-align: center;">{{ $no++ }}.</td>
                    <td>{{ $name[$key] }}</td>
                    <td style="text-align: center;">{{ $code[$key] }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <br>
        <p style="text-align: justify;">
            Untuk mengikuti {{ $load->hal }} yang dilaksanakan oleh {{ $load->penyelenggara }}. Kunjungan akan dilaksanakan pada hari <?php echo date('l, d F Y', strtotime($load->tanggal)); ?>.
        </p>
        <p style="text-align: justify;">
            Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana perlunya. Kepada penerima tugas setelah menyelesaikan tugas dimohon menyampaikan laporan kepada pemberi tugas.
        </p>
        <br>
        <b><p align="left">
            <!--p style="text-align: center;"-->
                {{ $jabat->jabatan }}<br><br>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <u>{{ $jabat->nama }}</u><br>
                {{ $jabat->nidn }}
            <!--/p-->
        </p></b>
    </font>
</body>

</html>
