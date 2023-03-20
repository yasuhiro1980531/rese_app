@extends('layouts.head')
@section('title')
店舗詳細
@endsection
@section('content')
<div class="container">
@extends('layouts.header')
  <div class="row justify-content-around">
    <div class="col-5">
      <div class="d-flex">
        <a href="{{route('shop.index')}}"><i class="bi bi-chevron-left return_btn"></i></a>
      <h2 class="mb-3">{{ $shop->name }}</h2>
      </div>
      
      <img src="{{ $shop->image_url }}" class="w-100 mb-3">
      <div class="d-flex">
        <p>#{{ $shop->area }}</p>
        <p>#{{ $shop->genre->name}}</p>
      </div>
      {{ $shop->text }} 
    </div>
    @auth
    <div class="col-5" >
      <form method="post" action="#">
        @csrf
        <div class="reserve">
          <div class="p-3">
            <h2 class="mb-3 text-white">予約</h2>
            <div class="mb-3">
              <input type="date" class="form-control">
            </div>
            <div class="mb-3">
              <input type="time" class="form-control">
            </div>
            <div class="mb-3">
              <input type="number" class="form-control">
            </div>
            <table class="text-white table" style=>
              <tr>
                <th class="col-4">Shop</th>
                <td>{{ $shop->name }}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>{{ $shop->name }}</td>
              </tr>
              <tr>
                <th>Time</th>
                <td>{{ $shop->name }}</td>
              </tr>
              <tr>
                <th>Number</th>
                <td>{{ $shop->name }}</td>
              </tr>
            </table>  
          </div>
            <button class="btn btn-primary w-100 reserve_btn"><a class="text-white"href="{{route('done')}}">予約する</a></button>
        </div>
      </form>
      @endauth
      @guest
      <div class="col-5" >
        <div class="row justify-content-center">
            <div class="card text-center mt-4">
              <div class="p-2">
                <h4 class="fw-bold my-3">ご予約するにはログインが必要です</h4>
                <a href="{{route('login')}}" class="btn btn-primary mb-5">ログインはこちら</a>
                <h4 class="fw-bold my-3">ログインするには会員登録が必要です</h4>
                <a href="{{route('register')}}" class="btn btn-primary mb-5">会員登録はこちら</a>
              </div>
            </div>
          
        </div>
      </div>
      @endguest
    </div>
  </div>
@endsection

