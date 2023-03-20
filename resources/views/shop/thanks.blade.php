@extends('layouts.head')
@section('title')
登録完了
@endsection
@section('content')
<div style="margin-top:100px;"class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mt-4">
      <div class="card text-center">
        <div class="card-body">
          <h2 class="card-text">会員登録ありがとうございます</h2>
          <a href="{{route('mypage')}}" class="btn btn-primary">ログインする</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection