@extends('layouts.app')

@section('title')
@section('content')
<div class="row">
    @if($pre->id_jenis==2)
        @if($pre->kepada!=null)
        <table>
            <tr>
                <td width="140px">&nbsp;&nbsp;&nbsp;Perihal</td>
                <td> : </td>
                <td>{{ $pre->perihal }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Kepada</td>
                <td> : </td>
                <td>{{ $pre->kepada }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Keterangan</td>
                <td> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $pre->keterangan; ?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Tanggal</td>
                <td> : </td>
                <td>{{ $pre->tanggal }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Waktu</td>
                <td> : </td>
                <td>{{ $pre->waktu }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Tempat</td>
                <td> : </td>
                <td>{{ $pre->tempat }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
                <td> : </td>
                <td>{{ $pre->user->name }}</td>
            </tr>
        </table>
        @else
        <table>
            <tr>
                <td width="140px">&nbsp;&nbsp;&nbsp;Perihal</td>
                <td> : </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->perihal }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
                <td> : </td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->user->name }}</td>
            </tr>
        </table>
        @endif
    @elseif($pre->id_jenis==4)
    <table>
        <tr>
            <td width="140px">&nbsp;&nbsp;&nbsp;Tema</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->perihal }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;NIM</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->kode }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Nama</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->nama }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Penyelenggara</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->penyelenggara }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tanggal</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->tanggal }}</td>
        </tr>
        @if($pre->tempat!=null)
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tempat</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->tempat }}</td>
        </tr>
        @endif
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->user->name }}</td>
        </tr>
    </table>
    @elseif($pre->id_jenis==3)
    <table>
        <tr>
            <td width="140px">&nbsp;&nbsp;&nbsp;Perihal</td>
            <td> : </td>
            <td>{{ $pre->perihal }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Kepada</td>
            <td> : </td>
            <td>{{ $pre->kepada }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Keterangan</td>
            <td> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><?php echo $pre->keterangan; ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tanggal</td>
            <td> : </td>
            <td>{{ $pre->tanggal }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Waktu</td>
            <td> : </td>
            <td>{{ $pre->waktu }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tempat</td>
            <td> : </td>
            <td>{{ $pre->tempat }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
            <td> : </td>
            <td>{{ $pre->user->name }}</td>
        </tr>
    </table>
    @elseif($pre->id_jenis==5)
    <table>
        <tr>
            <td width="140px">&nbsp;&nbsp;&nbsp;Tema</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->perihal }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tamu Pembicara</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->tamu }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tanggal</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->tanggal }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Sasaran Peserta</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->target }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Tempat</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->tempat }}</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
            <td> : </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pre->user->name }}</td>
        </tr>
    </table>
    @else
        @if($pre->kepada==null)
        <table>
            <tr>
                <td width="140px">&nbsp;&nbsp;&nbsp;Perihal</td>
                <td> : </td>
                <td>{{ $pre->perihal }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Mengingat</td>
                <td> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $pre->mengingat; ?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Menimbang</td>
                <td> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $pre->menimbang; ?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Menetapkan</td>
                <td> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $pre->keterangan; ?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
                <td> : </td>
                <td>{{ $pre->user->name }}</td>
            </tr>
        </table>
        @else
        <table>
            <tr>
                <td width="140px">&nbsp;&nbsp;&nbsp;Perihal</td>
                <td> : </td>
                <td>{{ $pre->perihal }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Kepada</td>
                <td> : </td>
                <td>{{ $pre->kepada }}</td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Keterangan</td>
                <td> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $pre->keterangan; ?></td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;Nama Pemohon</td>
                <td> : </td>
                <td>{{ $pre->user->name }}</td>
            </tr>
        </table>
        @endif
    @endif
</div>
@endsection