@extends('layouts.app')

@section('title')
@section('content')
<div class="row">
    @if($pre->id_jenis==2)
        @if($pre->kepada!=null)
            <div class="col-lg-3">
                Perihal
            </div>
            <div class="col-lg-9">
                {{ $pre->perihal }}
            </div>
            <div class="col-lg-3">
                Kepada
            </div>
            <div class="col-lg-9">
                {{ $pre->kepada }}
            </div>
            <div class="col-lg-3">
                Keterangan
            </div>
            <div class="col-lg-9">
                <?php echo $pre->keterangan; ?>
            </div>
            <div class="col-lg-3">
                Tanggal
            </div>
            <div class="col-lg-9">
                {{ $pre->tanggal }}
            </div>
            <div class="col-lg-3">
                Waktu
            </div>
            <div class="col-lg-9">
                {{ $pre->waktu }}
            </div>
            <div class="col-lg-3">
                Tempat
            </div>
            <div class="col-lg-9">
                {{ $pre->tempat }}
            </div>
            <div class="col-lg-3">
                Nama Pemohon
            </div>
            <div class="col-lg-9">
                {{ $pre->user->name }}
            </div>
        @else
            <div class="col-lg-4">
                Perihal
            </div>
            <div class="col-lg-8">
                {{ $pre->perihal }}
            </div>
            <div class="col-lg-3">
                Nama Pemohon
            </div>
            <div class="col-lg-9">
                {{ $pre->user->name }}
            </div>
        @endif
    @elseif($pre->id_jenis==4)
    <div class="col-lg-3">
        Tema
    </div>
    <div class="col-lg-9">
        {{ $pre->perihal }}
    </div>
    <div class="col-lg-3">
        NIM
    </div>
    <div class="col-lg-9">
        {{ $pre->kode }}
    </div>
    <div class="col-lg-3">
        Nama
    </div>
    <div class="col-lg-9">
        {{ $pre->nama }}
    </div>
    <div class="col-lg-3">
        Penyelenggara
    </div>
    <div class="col-lg-9">
        {{ $pre->penyelenggara }}
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pre->tanggal }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pre->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon
    </div>
    <div class="col-lg-9">
        {{ $pre->user->name }}
    </div>
    @elseif($pre->id_jenis==3)
    <div class="col-lg-3">
        Perihal
    </div>
    <div class="col-lg-9">
        {{ $pre->perihal }}
    </div>
    <div class="col-lg-3">
        Kepada
    </div>
    <div class="col-lg-9">
        {{ $pre->kepada }}
    </div>
    <div class="col-lg-3">
        Keterangan
    </div>
    <div class="col-lg-9">
        <?php echo $pre->keterangan; ?>
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pre->tanggal }}
    </div>
    <div class="col-lg-3">
        Waktu<
    </div>
    <div class="col-lg-9">
        {{ $pre->waktu }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pre->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon
    </div>
    <div class="col-lg-9">
        {{ $pre->user->name }}
    </div>
    @elseif($pre->id_jenis==5)
    <div class="col-lg-4">
        Tema
    </div>
    <div class="col-lg-8">
        {{ $pre->perihal }}
    </div>
    <div class="col-lg-4">
        Tamu Pembicara
    </div>
    <div class="col-lg-8">
        {{ $pre->tamu }}
    </div>
    <div class="col-lg-4">
        Tanggal
    </div>
    <div class="col-lg-8">
        {{ $pre->tanggal }}
    </div>
    <div class="col-lg-4">
        Sasaran Peserta
    </div>
    <div class="col-lg-8">
        {{ $pre->target }}
    </div>
    <div class="col-lg-4">
        Tempat
    </div>
    <div class="col-lg-8">
        {{ $pre->tempat }}
    </div>
    <div class="col-lg-4">
        Nama Pemohon
    </div>
    <div class="col-lg-8">
        {{ $pre->user->name }}
    </div>
    @else
        @if($pre->kepada==null)
            <div class="col-lg-4">
                Perihal
            </div>
            <div class="col-lg-8">
                {{ $pre->perihal }}
            </div>
            <div class="col-lg-4">
                Keterangan
            </div>
            <div class="col-lg-8">
                <?php echo $pre->keterangan; ?>
            </div>
            <div class="col-lg-4">
                Nama Pemohon
            </div>
            <div class="col-lg-8">
                {{ $pre->user->name }}
            </div>
        @else
            <div class="col-lg-4">
                Perihal
            </div>
            <div class="col-lg-8">
                {{ $pre->perihal }}
            </div>
            <div class="col-lg-4">
                Kepada
            </div>
            <div class="col-lg-8">
                {{ $pre->kepada }}
            </div>
            <div class="col-lg-4">
                Keterangan
            </div>
            <div class="col-lg-8">
                <?php echo $pre->keterangan; ?>
            </div>
            <div class="col-lg-4">
                Nama Pemohon
            </div>
            <div class="col-lg-8">
                {{ $pre->user->name }}
            </div>
        @endif
    @endif
</div>
@endsection