@extends('layouts.head')
@section('title')
マイページ
@endsection
@section('content')

<div class="container">
  @extends('layouts.header')
  <div class="row justify-content-center">
    <div class="col-6"></div>
    <div class="col-6">
      <h2 class="">{{$user->name}}さん</h2>
    </div>
    <div class="col-6">
      <h2>予約一覧</h2>
      <table class="text-white table p-2" id="table">
        <tr>
          <th class="col-3"><i class="bi bi-clock"></i>予約1</th>
          <td class="text-end"><i class="bi bi-x-circle"></i></td>
        </tr>
        <tr>
          <th class="text-center">Shop</th>
          <td>店名</td>
        </tr>
        <tr>
          <th class="text-center">Date</th>
          <td id="reserveDate">予約日時</td>
        </tr>
        <tr>
          <th class="text-center">Time</th>
          <td id="reserveTime">予約時間</td>
        </tr>
        <tr>
          <th class="text-center">Number</th>
          <td id="reserveNum">予約人数</td>
        </tr>
      </table>  
    </div>
    <div class="col-6">
      
      <h2>お気に入り店舗</h2>
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
