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
                    <th>#</th>
                    <th>No Surat</th>
                    <th>Kepentingan Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Pembuat Surat</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
            @foreach($tab as $tbl => $item)
                @if($item->id_pejabat!=null)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->no_surat }}</td>
                    <td>{{ $item->surat->perihal }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->surat->user->name }}</td>
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