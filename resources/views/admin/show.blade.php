@extends('layouts.app')

@section('title')
@section('content')
<div class="row">
@foreach($pre as $pvw)
    @if($pvw->jenis==2)
    <div class="col-lg-3">
        Nomor Surat
    </div>
    <div class="col-lg-9">
        {{ $pvw->no_surat }}
    </div>
    <div class="col-lg-3">
        Perihal
    </div>
    <div class="col-lg-9">
        {{ $pvw->hal }}
    </div>
    <div class="col-lg-3">
        Kepada
    </div>
    <div class="col-lg-9">
        {{ $pvw->kepada }}
    </div>
    <div class="col-lg-3">
        Keterangan
    </div>
    <div class="col-lg-9">
        {{ $pvw->keterangan }}
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pvw->tanggal }}
    </div>
    <div class="col-lg-3">
        Waktu<
    </div>
    <div class="col-lg-9">
        {{ $pvw->waktu }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pvw->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon
    </div>
    <div class="col-lg-9">
        {{ $pvw->nama }}
    </div>
    @elseif($pvw->jenis==4)
    <div class="col-lg-3">
        Nomor Surat
    </div>
    <div class="col-lg-9">
        {{ $pvw->no_surat }}
    </div>
    <div class="col-lg-3">
        Tema
    </div>
    <div class="col-lg-9">
        {{ $pvw->hal }}
    </div>
    <div class="col-lg-3">
        NIM
    </div>
    <div class="col-lg-9">
        {{ $pvw->kode }}
    </div>
    <div class="col-lg-3">
        Nama
    </div>
    <div class="col-lg-9">
        {{ $pvw->name }}
    </div>
    <div class="col-lg-3">
        Penyelenggara
    </div>
    <div class="col-lg-9">
        {{ $pvw->penyelenggara }}
    </div>
    <div class="col-lg-3">
        Tanggal
    </div>
    <div class="col-lg-9">
        {{ $pvw->tanggal }}
    </div>
    <div class="col-lg-3">
        Tempat
    </div>
    <div class="col-lg-9">
        {{ $pvw->tempat }}
    </div>
    @endif
    @endforeach
</div>
@endsection