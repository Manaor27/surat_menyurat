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
                <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="45" height="65"/>
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
                <font size="1">
                    &#9744; &nbsp;PROGRAM STUDI INFORMATIKA<br>
                    &#9744; &nbsp;PROGRAM STUDI SISTEM INFORMASI
                </font>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <u><b><font size="4" face="Times New Roman">SURAT TUGAS</font></b></u><br>
        Nomor: {{ $down->no_surat }}
    </center>
    <br>
    <br>
    <br>
    <font size="3" face="Times New Roman" class="element">
        <p style="text-align: justify;">
            Dengan ini {{ $down->pejabat->jabatan }} Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta memberikan tugas kepada {{ Auth::user()->role }} tersebut di bawah ini:
        </p>
        @php
            $no = 1;
            $name = array();
            $name = explode(',', $down->surat->nama);
            $code = array();
            $code = explode(',', $down->surat->kode);
        @endphp
    @if(count($code)>1)
        <table align="center" border="1">
            <thead>
                <tr style="text-align: center;">
                    <td >No.</td>
                    <td >Nama</td>
                    @if(Auth::user()->role=="mahasiswa")
                    <td >NIM</td>
                    @else
                    <td >NIK</td>
                    @endif
                </tr>
            </thead>
            @foreach($code as $key => $value)
            <tbody>
                <tr>
                    <td style="text-align: center;" width="50px">{{ $no++ }}.</td>
                    <td width="350px">{{ $name[$key] }}</td>
                    <td style="text-align: center;" width="200px">{{ $code[$key] }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    @else
        @foreach($code as $key => $value)
        <table>
            <tr>
                <td><b>Nama </b></td>
                <td><b> : </b></td>
                <td> {{ $name[$key] }}</td>
            </tr>
            <tr>
                @if(Auth::user()->role=="dosen")
                <td>NIK</td>
                @else
                <td>NIM</td>
                @endif
                <td> : </td>
                <td width="200px"> {{ $code[$key] }}</td>
            </tr>
        </table>
        @endforeach
    @endif
        <br>
        <p style="text-align: justify;">
            Untuk mengikuti {{ $down->surat->perihal }} yang dilaksanakan oleh {{ $down->surat->penyelenggara }}. Kunjungan akan dilaksanakan pada hari <?php echo date('l, d F Y', strtotime($down->surat->tanggal)); ?>.
        </p>
        <p style="text-align: justify;">
            Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana perlunya. Kepada penerima tugas setelah menyelesaikan tugas dimohon menyampaikan laporan kepada pemberi tugas.
        </p>
        <br>
        <b><p align="left">
            <!--p style="text-align: center;"-->
                {{ $down->pejabat->jabatan }}<br><br>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <u>{{ $down->pejabat->nama }}</u><br>
                {{ $down->pejabat->nidn }}
            <!--/p-->
        </p></b>
    </font>
</body>

</html>
