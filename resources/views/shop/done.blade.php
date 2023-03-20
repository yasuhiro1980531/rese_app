@extends('layouts.head')
@section('title')
予約完了
@endsection
@section('content')
<div style="margin-top:100px;"class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mt-4">
      <div class="card text-center">
        <div class="card-body">
          <h2 class="card-text">ご予約ありがとうございます</h2>
          <a href="{{route('shop.index')}}" class="btn btn-primary">戻る</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection