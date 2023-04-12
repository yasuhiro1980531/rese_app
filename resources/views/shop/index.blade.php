@extends('layouts.head')
@section('title')
店舗一覧
@endsection
@section('content')
<div class="container">
  <div>
    @extends('layouts.sidebar')
  </div>
  <form id="form" name="searchform" method="get">
      @csrf  
  <div class="row justify-content-center mb-2">
      <div class="col-sm-3">
        <select id="area" name="area" class="form-select">
        <option value="">All area</option>
        @foreach($shops->unique('area') as $shop)
        <option value="{{ $shop->area }}" @if($area == $shop->area) selected @endif>{{ $shop->area }}</option>
        @endforeach
        </select>
      </div>
      <div class="col-sm-3">
        <select id="genre" name="genre" class="form-select">
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
      <img src="{{ \Storage::url($result->image_url) }}" style="padding-top:12px;">
        <div class="p-3"> 
          <h2 class="fw-bold">{{$result->shop_name}}</h2>
          <div class="d-flex">
            <p class=mr-1>#{{$result->area}}</p>
            <p>#{{$result->genre->name}}</p>
          </div>
          <div class="d-flex justify-content-between">
            <a href="{{ route('shop.detail', ['id'=> $result->id]) }}" class="btn btn-primary mt-1 mb-2">詳しく見る</a>
          <div>
          @auth
          @if($likes->where('user_id',$user_id)->where('shop_id',$result->id)->first())
            <a href="{{ route('unlike', $result) }}">  
            <button id ="unlike"><i class="fa fa-solid fa-heart" style="color: #f96262;"></i></button>
            </a>
          @else
            <a  href="{{ route('like', $result) }}">
            <button id="like"><i class="fa fa-regular fa-heart"></i></button>
            </a>
          @endif
          @endauth
          </div>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
<script src="{{asset('/js/search.js')}}"></script>
@endsection
