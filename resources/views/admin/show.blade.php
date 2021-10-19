@extends('layouts.app')

@section('title')
@section('content')
<div class="row">
@foreach($pre as $pvw)
    <div class="col-lg-3">
        Nomor Surat</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->no_surat }}
    </div>
    <div class="col-lg-3">
        Perihal</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->hal }}
    </div>
    <div class="col-lg-3">
        Kepada</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->kepada }}
    </div>
    <div class="col-lg-3">
        Keterangan</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->keterangan }}
    </div>
    <div class="col-lg-3">
        Tanggal</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->tanggal }}
    </div>
    <div class="col-lg-3">
        Waktu</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->waktu }}
    </div>
    <div class="col-lg-3">
        Tempat</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->tempat }}
    </div>
    <div class="col-lg-3">
        Nama Pemohon</th>
    </div>
    <div class="col-lg-9">
        {{ $pvw->nama }}
    </div>
    @endforeach
</div>
@endsection