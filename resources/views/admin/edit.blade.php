@extends('layouts.head')
@section('title')
店舗情報変更
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 m-auto mt-5">
      <div class="card text-center">
        <div class="card-body">
          <div class="p-3">
            <h2 class="mb-3">店舗情報変更</h2>
            <form action="{{ route('admin.update',['id' => $shops->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="mb-3">
              @if ($errors->has('name'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('name') }}</p>
              @endif
              <input type="text" name="name" value="{{$shops->shop_name}}" class="form-control">
            </div>
            <div class="mb-3">
              @if ($errors->has('area'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('area') }}</p>
              @endif
              <input type="text" name="area" value="{{$shops->area}}" class="form-control">
            </div>
            <div class="mb-3">
              @if ($errors->has('genre'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('genre') }}</p>
              @endif
              <select id="genre" name="genre_id" class="form-select">
              <option value="{{$shops->genre->id}}">{{$shops->genre->name}}</option>
              @foreach($genres as $genre)
              <option value="{{$genre->id}}">{{ $genre->name }}</option>
              @endforeach
              </select>
              <p class="mt-3 text-danger text-start">※ジャンルがない場合は<a href="#">こちら</a>からジャンルを追加してください</p>
            </div>
            <div class="mb-3">
              @if ($errors->has('text'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('text') }}</p>
              @endif
              <input type="text" name="text" value="{{ $shops->text }}" class="form-control" style="height:120px;">
            </div>
            <div class="mb-3">
              <input class="form-control" type="file" value="{{ $shops->image_url }}" id="formFile" name="image_url">
            </div> 
              <button class="btn btn-primary p-2 mt-3">店舗情報を更新する</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection