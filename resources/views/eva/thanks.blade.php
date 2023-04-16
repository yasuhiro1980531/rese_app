@extends('layouts.head')
@section('title')
登録完了
@endsection
@section('content')
<div style="margin-top:100px;"class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-4">
      <div class="card text-center">
        <div class="card-body">
          <h2 class="card-text">{{$message}}</h2>
          <form action="{{ route('reserve.delete',['id' => $reserve_id]) }}" method="POST">
            @csrf
              <button class="btn btn-primary">マイページに戻る</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection