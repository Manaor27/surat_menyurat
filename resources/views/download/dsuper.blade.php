<html>
<head>
    <title>Surat Personalia</title>
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
    @if($down->surat->kepada==null)
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
    <font size="3" face="Times New Roman" class="element">
        <p style="text-align: justify;">
            Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana
        </p>
        @php
            $list = array('a.','b.','c.','d.','e.','f.','g.','h.','i.','j.');
            $menimbang = array();
            $menimbang = explode('|', $down->surat->menimbang);

            $li = array('1.','2.','3.','4.','5.','6.','7.','8.','9.','10.');
            $mengingat = array();
            $mengingat = explode('|', $down->surat->mengingat);
        @endphp
        <table>
            <tr>
                <td rowspan="{{count($menimbang)}}" valign="top" width="100px">Menimbang </td>
                <td rowspan="{{count($menimbang)}}" valign="top" width="20px"> : </td>
                <td valign="top" width="20px"> {{ $list[0] }} </td>
                <td style="text-align: justify;"><?php echo $menimbang[0]; ?></td>
            </tr>
            <?php for($i=1; $i<count($menimbang); $i++) {?>
            <tr>
                <td valign="top"> {{ $list[$i] }} </td>
                <td style="text-align: justify;"><?php echo $menimbang[$i]; ?></td>
            </tr>
            <?php } ?>
            <tr><td colspan="4">&nbsp;</td></tr>
            <tr>
                <td rowspan="{{count($mengingat)}}" valign="top">Mengingat</td>
                <td rowspan="{{count($mengingat)}}" valign="top"> : </td>
                <td valign="top"> {{ $li[0] }} </td>
                <td style="text-align: justify;"><?php echo $mengingat[0]; ?></td>
            </tr>
            <?php for($j=1; $j<count($mengingat); $j++) {?>
            <tr>
                <td valign="top"> {{ $li[$j] }} </td>
                <td style="text-align: justify;"><?php echo $mengingat[$j]; ?></td>
            </tr>
            <?php } ?>
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
            $urut = array('Pertama','Kedua','Ketiga','Keempat','Kelima','Keenam','Ketujuh','Kedelapan','Kesembilan','Kesepuluh');
            $ket = array();
            $ket = explode('|', $down->surat->keterangan);
        @endphp
        @foreach($ket as $key => $value)
        <tr>
            <td valign="top"><b><font size="3" face="Times New Roman" class="element">{{ $urut[$key] }}</font></b></td>
            <td valign="top"><b><font size="3" face="Times New Roman" class="element"> : </font></b></td>
            <td style="text-align: justify;"><font size="3" face="Times New Roman" class="element"><?php echo $ket[$key]; ?>.</font></td>
        </tr>
        @endforeach
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
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
            <td rowspan="5">&nbsp;</td>
            <td rowspan="5">&nbsp;</td>
            <td><font size="3" face="Times New Roman" class="element">
                Ditetapkan di: Yogyakarta <br>
                Pada tanggal : <?php echo tanggal_indo(date('Y-m-d', strtotime($down->tanggal)), false); ?></font>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td><font size="3" face="Times New Roman" class="element">{{ $down->pejabat->jabatan }},</font></td></tr>
        <tr><td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($down->pejabat->nama)) !!}" /></td></tr>
        <tr>
            <td><font size="3" face="Times New Roman" class="element">
                {{ $down->pejabat->nama }} <br>
                NIK: {{ $down->pejabat->nidn }}</font>
            </td>
        </tr>
    </table>
    @else
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
    <table>
        <tr>
            <td><font size="3" face="Times New Roman">Nomor</font></td>
            <td><font size="3" face="Times New Roman"> : </font></td>
            <td width="400px"><font size="3" face="Times New Roman">{{ $down->no_surat }}</font></td>
            <td style="text-align: right;" width="250px"><font size="3" face="Times New Roman"><?php echo tanggal_indo(date('Y-m-d', strtotime($down->tanggal)), false); ?></font></td>
        </tr>
        <tr>
            <td><font size="3" face="Times New Roman">Hal</font></td>
            <td><font size="3" face="Times New Roman"> : </font></td>
            <td><font size="3" face="Times New Roman">{{ $down->surat->perihal }}</font></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><font size="3" face="Times New Roman">Lamp.</font></td>
            <td><font size="3" face="Times New Roman"> : </font></td>
            <td><font size="3" face="Times New Roman">1 Lembar</font></td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr><td><b><font size="3" face="Times New Roman">Kepada Yth.:</font></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">{{ $down->surat->kepada }}</font></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">Universitas Kristen Duta Wacana</font></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">Yogyakarta</font></b></td></tr>
    </table>
    <br>
    <table>
        <tr><td><font size="3" face="Times New Roman">Salam sejahtera,</font></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td style="text-align: justify;"><font size="3" face="Times New Roman"><?php echo $down->surat->keterangan; ?></font></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td style="text-align: justify;"><font size="3" face="Times New Roman">Demikian surat ini kami sampaikan. Atas perhatian dan kerjasama yang diberikan kami mengucapkan terima kasih.</font></td></tr>
    </table>
    <br>
    <table>
        <tr><td><b><font size="3" face="Times New Roman">{{ $down->pejabat->jabatan }},</font></b></td></tr>
        <tr><td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($down->pejabat->nama)) !!}" /></td></tr>
        <tr><td><b><u><font size="3" face="Times New Roman">{{ $down->pejabat->nama }}</font></u></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">NIK : {{ $down->pejabat->nidn }}</font></b></td></tr>
    </table>
    @endif
</body>

</html>
