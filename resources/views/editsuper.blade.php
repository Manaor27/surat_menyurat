<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Personalia & SK</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Surat Personalia & SK
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Jenis Surat</li>
        <li class="active">Surat Personalia & SK</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/super/update/{{ $srt->id }}">
        @csrf
        @method('PUT')
          <div class="box-body">
          @if($info->status='perihal kurang jelas')
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ $srt->perihal }}" required>
            </div>
          @else
            <div class="form-group">
              <label>Perihal</label>
              <input type="text" class="form-control" name="perihal" placeholder="Tentang" value="{{ $srt->perihal }}" readonly>
            </div>
          @endif
          @php
            $ket = array();
            $ket = explode(';', $srt->keterangan);
          @endphp
            <div class="form-group">
              <table class="table" id="dynamicRemove">
              @foreach($ket as $key => $value)
                <tr>
                  <td style="width: 850px">
                    <label for="exampleInputPassword1">Keterangan</label></br>
                    <textarea placeholder="Place some text here" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="keterangan[]" required>{{ $ket[$key] }}</textarea>
                  </td>
                </tr>
              @endforeach
              </table>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
</body>
</html>