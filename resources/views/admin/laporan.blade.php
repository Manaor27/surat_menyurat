<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center>
        <h3>Laporan Pengajuan Pembuatan Surat</h3>
        <br>
        <table border="2">
            <thead>
                <tr>
                    <th width="50px" style="text-align: center;">#</th>
                    <th width="125px" style="text-align: center;">No Surat</th>
                    <th width="450px" style="text-align: center;">Kepentingan Surat</th>
                    <th width="115px" style="text-align: center;">Tanggal Surat</th>
                    <th width="200px" style="text-align: center;">Pembuat Surat</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
            @foreach($tab as $tbl => $item)
                @if($item->id_pejabat!=null)
                <tr>
                    <td style="text-align: center;">{{ $no++ }}</td>
                    <td style="text-align: center;">{{ $item->no_surat }}</td>
                    <td>&nbsp;&nbsp;{{ $item->surat->perihal }}</td>
                    <td style="text-align: center;"><?php echo date('d-m-Y', strtotime($item->tanggal)); ?></td>
                    <td >&nbsp;&nbsp;{{ $item->surat->user->name }}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>
</html>