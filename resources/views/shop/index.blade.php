@extends('layouts.head')
@section('title')
店舗一覧
@endsection
@section('content')
<div class="container">
@extends('layouts.header')
  <form id="form" method="get">
      @csrf  
  <div class="row justify-content-center mb-2">
      <div class="col-sm-3">
        <select class="form-select" name="area">
        <option value="">All area</option>
        @foreach($shops->unique('area') as $shop)
        <option value="{{ $shop->area }}" @if($area == $shop->area) selected @endif>{{ $shop->area }}</option>
        @endforeach
        </select>
      </div>
      <div class="col-sm-3">
        <select name="genre" class="form-select">
        <option value="">All genre</option>
        @foreach($genres as $genre)
        <option value="{{ $genre->id }}" @if($genre_id == $genre->id ) selected @endif >
        {{ $genre->name }}</option>
        @endforeach
        </select>
      </div>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="Search ..." name="keyword">
      </div>
  </div>
  </form>
</div>
  <div class="row row-cols-5 justify-content-center">
    @foreach($results as $result)
    <div class="card m-2" style="width: 18rem;">
      <img src="{{$result->image_url}}">
        <div class="p-3"> 
          <h2 class="fw-bold">{{$result->name}}</h2>
          <div class="d-flex">
            <p class=mr-1>#{{$result->area}}</p>
            <p>#{{$result->genre->name}}</p>
          </div>
          <div class="d-flex justify-content-between">
            <a href="{{ route('shop.detail', ['id'=>$shop->id]) }}" class="btn btn-primary">詳しく見る</a>
            <i class="fa fa-regular fa-heart"></i>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
