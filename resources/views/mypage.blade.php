@extends('layouts.head')
@section('title')
マイページ
@endsection
@section('content')
<div class="container">
  @extends('layouts.sidebar')
  <div class="row justify-content-center">
    <div class="col-6"></div>
    <div class="col-6">
      <h2 class="">{{$user->name}}さん</h2>
    </div>
    <div class="col-6">
      <h2>予約一覧</h2>
      @if($reserves->where('user_id',$user->id)->first())
      @foreach($reserves as $reserve)
      <table class="text-white table p-2" id="table">
        <tr>
          <th class="col-3"><i class="bi bi-clock"></i>予約</th>
          <form action="{{ route('reserve.delete',['id' => $reserve->id]) }}" method="POST">
            @csrf
          <td class="text-end"><button><i class="bi bi-x-circle"></i></button></td>
          </form>
        </tr>
        <tr>
          <th class="text-center">Shop</th>
          <td>{{$reserve->shop->name}}</td>
        </tr>
        <tr>
          <th class="text-center">Date</th>
          <td id="reserveDate">{{$reserve->reserve_date}}</td>
        </tr>
        <tr>
          <th class="text-center">Time</th>
          <td id="reserveTime">{{$reserve->reserve_time}}</td>
        </tr>
        <tr>
          <th class="text-center">Number</th>
          <td id="reserveNum">{{$reserve->reserve_num}}人</td>
        </tr>
      </table>
      @endforeach
      @else
      <div class="col-8 alert alert-info mt-4 text-center" role="alert">
        現在の予約はありません。
      </div>
      @endif
    </div>
    <div class="col-6">
      <h2>お気に入り店舗</h2>
      @if($likes->where('user_id',$user->id)->first())
      <div class="row row-cols-5 justify-content-center">
        @foreach($likes as $like)
        <div class="card m-2" style="width: 16rem;">
          <img src="{{$like->shop->image_url}}">
            <div class="p-3"> 
              <h2 class="fw-bold">{{$like->shop->name}}</h2>
              <div class="d-flex">
                <p class=mr-1>#{{$like->shop->area}}</p>
                <p>#{{$like->shop->genre->name}}</p>
              </div>
              <div class="d-flex justify-content-between">
                <a href="{{ route('shop.detail', ['id'=>$like->shop->id]) }}" class="btn btn-primary">詳しく見る</a>
              <div>
                @if($likes->where('user_id',Auth::id())->where('shop_id',$like->shop->id)->first())
                  <a href="{{ route('mypage.likeDelete',$like) }}">
                  <button><i class="fa fa-solid fa-heart" style="color: #f96262;"></i></button>
                  </a>
                @else
                  <a href="{{ route('like', $like) }}">
                  <button><i id="heart" class="fa fa-regular fa-heart"></i></button>
                  </a>
                @endif
              </div>
              </div>
            </div>
        </div>
        @endforeach
      </div>
      @else
        <div class="col-8 alert alert-info mt-4 text-center" role="alert">
          お気に入り店舗はありません。
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
