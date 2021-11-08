@extends('layouts.app')

@section('title')
@section('content')
<div class="row">
    @if($pre->surat->id_jenis==2)
    <div class="col-lg-3">
        Perihal
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->perihal }}
    </div>
    <div class="col-lg-3">
        Kepada
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->kepada }}
    </div>
    <div class="col-lg-3">
        Keterangan
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->keterangan }}
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->tanggal }}
    </div>
    <div class="col-lg-3">
        Waktu<
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->waktu }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->user->nama }}
    </div>
    @elseif($pre->surat->id_jenis==4)
    <div class="col-lg-3">
        Tema
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->perihal }}
    </div>
    <div class="col-lg-3">
        NIM
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->kode }}
    </div>
    <div class="col-lg-3">
        Nama
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->name }}
    </div>
    <div class="col-lg-3">
        Penyelenggara
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->penyelenggara }}
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->tanggal }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->user->nama }}
    </div>
    @elseif($pre->surat->id_jenis==3)
    <div class="col-lg-3">
        Perihal
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->perihal }}
    </div>
    <div class="col-lg-3">
        Kepada
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->kepada }}
    </div>
    <div class="col-lg-3">
        Keterangan
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->keterangan }}
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->tanggal }}
    </div>
    <div class="col-lg-3">
        Waktu<
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->waktu }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon
    </div>
    <div class="col-lg-9">
        {{ $pre->surat->user->nama }}
    </div>
    @elseif($pre->surat->id_jenis==5)
    <div class="col-lg-4">
        Tema
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->perihal }}
    </div>
    <div class="col-lg-4">
        Tamu Pembicara
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->tamu }}
    </div>
    <div class="col-lg-4">
        Tanggal
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->tanggal }}
    </div>
    <div class="col-lg-4">
        Target Peserta
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->target }}
    </div>
    <div class="col-lg-4">
        Tempat
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->tempat }}
    </div>
    <div class="col-lg-4">
        Nama Pemohon
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->user->nama }}
    </div>
    @else
    <div class="col-lg-4">
        Perihal
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->perihal }}
    </div>
    <div class="col-lg-4">
        Keterangan
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->keterangan }}
    </div>
    <div class="col-lg-4">
        Nama Pemohon
    </div>
    <div class="col-lg-8">
        {{ $pre->surat->user->nama }}
    </div>
    @endif
</div>
@endsection