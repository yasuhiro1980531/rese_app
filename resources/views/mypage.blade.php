@extends('layouts.head')
@section('title')
マイページ
@endsection
@section('content')

<div class="container">
  @extends('layouts.header')
  <P>{{$user->name}}さんのマイページ</p>
  <div class="row justify-content-center">
    <div class="col-6">
      <table class="text-white table" id="table">
        <tr>
          <th class="col-4">Shop</th>
          <td>店名</td>
        </tr>
        <tr>
          <th>Date</th>
          <td id="reserveDate">予約日時</td>
        </tr>
        <tr>
          <th>Time</th>
          <td id="reserveTime">予約時間</td>
        </tr>
        <tr>
          <th>Number</th>
          <td id="reserveNum">予約人数</td>
        </tr>
      </table>  
    </div>
    <div class="col-6">
      <div class="row row-cols-5 justify-content-center">
        @foreach($shops as $shop)
        <div class="card m-2" style="width: 16rem;">
          <img src="{{$shop->image_url}}">
            <div class="p-3"> 
              <h2 class="fw-bold">{{$shop->name}}</h2>
              <div class="d-flex">
                <p class=mr-1>#{{$shop->area}}</p>
                <p>#{{$shop->genre->name}}</p>
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
  </div>
</div>
@endsection
