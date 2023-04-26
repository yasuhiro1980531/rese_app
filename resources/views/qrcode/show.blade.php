@extends('layouts.head')
@section('title')
マイページ
@endsection
<div style="margin-top:100px;"class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mt-4">
      <div class="card text-center">
        <div class="card-body">
          <h2 class="card-text">{!! QrCode::generate(route('qrcode.show',['id' =>$reserve->id])); !!}</h2>
          <a href="{{route('mypage')}}" class="btn btn-primary">戻る</a>
        </div>
      </div>
    </div>
  </div>
</div>
