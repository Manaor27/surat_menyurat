<html>
<head>
    <title>Surat Personalia</title>
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
        <b><font size="4" face="Times New Roman">SURAT KEPUTUSAN DEKAN</font></b><br>
        <b><font size="4" face="Times New Roman">FAKULTAS TEKNOLOGI INFORMASI</font></b><br>
        UNIVERSITAS KRISTEN DUTA WACANA <br>
        NOMOR: <b>{{ $down->no_surat }}</b>
        <br>
        <br>
        <font size="3" face="Times New Roman">Tentang:</font>
        <br>
        <br>
        <b><?php echo strtoupper($down->surat->perihal); ?></b>
    </center>
    <br>
    <br>
    <font size="1" face="Times New Roman" class="element">
        <p style="text-align: justify; font-size: 11pt;">
            Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana
        </p>
        <table>
            <tr>
                <td rowspan="4" valign="top" width="100px">Menimbang </td>
                <td rowspan="4" valign="top" width="20px"> : </td>
                <td valign="top" width="20px"> a. </td>
                <td style="text-align: justify;">bahwa untuk kelancaran perkuliahan dan dukungan penuh pelaksanaan penelitian dosen dan mahasiswa
                pada fasilitas Laboratorium, dipandang perlu adanya koordinator laboratorium Fakultaas Teknologi Informasi(FTI) Universitas Kristen Duta Wacana (UKDW) Yogyakarta;</td>
            </tr>
            <tr>
                <td valign="top"> b. </td>
                <td style="text-align: justify;">bahwa tugas sebagai koordinator laboratorium adalah tugas penunjang yang meliputi
                pengembangan laboratorium, mendukung komunitas penelitian dosen dan mahasiswa, dan pengaturan penggunaan laboratorium bagi dosen dan mahasiswa;</td>
            </tr>
            <tr>
                <td valign="top"> c. </td>
                <td style="text-align: justify;">bahwa dipandang perlu untuk meningkatkan efisiensi dan efektifitas pemanfaatan laboratorium yang dikelola oleh FTI UKDW secara bersama-sama;</td>
            </tr>
            <tr>
                <td valign="top"> d. </td>
                <td style="text-align: justify;">bahwa dipandang perlu diterbitkannya Surat Keputusan Dekan terkait pengangkatan tim koordinator untuk pengelolaan dan pengembangan laboratorium komputer yang dikelola oleh FTI UKDW.</td>
            </tr>
            <tr><td colspan="4">&nbsp;</td></tr>
            <tr>
                <td rowspan="6" valign="top">Mengingat</td>
                <td rowspan="6" valign="top"> : </td>
                <td valign="top"> 1. </td>
                <td style="text-align: justify;">Undang-undang Republik Indonesia Nomor 14 Tahun 2004 tentang Guru dan Dosen.</td>
            </tr>
            <tr>
                <td valign="top"> 2. </td>
                <td style="text-align: justify;">Peraturan Pemerintah RI Nomor 37 Tahun 2009 tentang Dosen(lembaran Negara Republik Indonesia dan tambahan Lembaran Negara    Republik Indonesia Nomor 5007).</td>
            </tr>
            <tr>
                <td valign="top"> 3. </td>
                <td style="text-align: justify;">Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 17 Tahun 2013 tentang Jabatan Fungsional Dosen dan Angka Kreditnya.</td>
            </tr>
            <tr>
                <td valign="top"> 4. </td>
                <td style="text-align: justify;">Statuta Universitas Kristen Duta Wacana Yogyakarta tahun 2010 dengan nomor QADW-110-SU-10.01.001 Bab 4 Pasal 33.</td>
            </tr>
            <tr>
                <td valign="top"> 5. </td>
                <td style="text-align: justify;">Kebijakan Akademik Universitas Kristen Duta Wacana Yogyakarta tahun 2008-2013.</td>
            </tr>
            <tr>
                <td valign="top"> 6. </td>
                <td style="text-align: justify;">Peraturan Akademik Universitas Kristen Duta Wacana tahun 2009-2014 Bab 3 pasal 5.</td>
            </tr>
        </table>
    </font>
        <br>
    <table>
            <tr>
                <td colspan="3" style="text-align: center;"><b><font size="3" face="Times New Roman" class="element">MEMUTUSKAN:</b></td>
            </tr>
            <tr>
                <td width="75px"><b><font size="3" face="Times New Roman" class="element">Menetapkan</b></td>
                <td width="10px"><b><font size="3" face="Times New Roman" class="element"> : </b></td>
                <td></td>
            </tr>
            @php
                $urut = array("Pertama","Kedua","Ketiga","Keempat","Kelima","Keenam","Ketujuh","Kedelapan","Kesembilan","Kesepuluh");
                $ket = array();
                $ket = explode(',', $down->surat->keterangan);
            @endphp
            @foreach($ket as $key => $value)
            <tr>
                <td valign="top"><b><font size="3" face="Times New Roman" class="element">{{ $urut[$key] }}</font></b></td>
                <td valign="top"><b><font size="3" face="Times New Roman" class="element"> : </font></b></td>
                <td style="text-align: justify;"><font size="3" face="Times New Roman" class="element">{{ $ket[$key] }}</font></td>
            </tr>
            @endforeach
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr>
                <td rowspan="5">&nbsp;</td>
                <td rowspan="5">&nbsp;</td>
                <td><font size="3" face="Times New Roman" class="element">
                    Ditetapkan di: Yogyakarta <br>
                    Pada tanggal : <?php echo date('d F Y'); ?></font>
                </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><font size="3" face="Times New Roman" class="element">{{ $down->pejabat->jabatan }},</font></td></tr>
            <tr><td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!}" /></td></tr>
            <tr>
                <td><font size="3" face="Times New Roman" class="element">
                    {{ $down->pejabat->nama }} <br>
                    NIK: {{ $down->pejabat->nidn }}</font>
                </td>
            </tr>
    </table>
</body>

</html>
