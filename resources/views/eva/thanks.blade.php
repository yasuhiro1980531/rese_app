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
          @foreach($reserves as $reserve)
          <form action="{{ route('eva.delete',['id' => $reserve->id]) }}" method="POST">
          @endforeach
            @csrf
              <button class="btn btn-primary">マイページに戻る</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection