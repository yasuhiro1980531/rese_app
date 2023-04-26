@extends('layouts.head')
@section('title')
店舗責任者専用画面
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-around">
    <div class="col-5">
      <h2>{{$user->name}}さんの担当店舗</h2>
      <div class="d-flex">
      @foreach($myShops as $myShop)
      <h2 class="mb-3">{{ $myShop->shop_name }}</h2>
      </div>
      <img src="{{ \Storage::url($myShop->image_url) }}" class="w-100 mb-3">
      <div class="d-flex">
        <p>#{{ $myShop->area }}</p>
        <p>#{{ $myShop->genre->name}}</p>
      </div>
      {{ $myShop->text }}
        <div class="mt-5 text-center">
          <a href="{{ route('manager.edit',['id' => $myShop->id]) }}">
          <button class="btn btn-primary px-4 py-3">店舗情報を編集する</button>
          </a>
        </div>
      @endforeach
    </div>
    <div class="col-5">
      <h2>予約一覧</h2>
      @if($myReserves == null)
      <div class="col-8 alert alert-info mt-4 text-center" role="alert">
        現在の予約はありません。
      </div>
      @else
      @foreach($myReserves as $myReserve)
      <table class="text-white table p-2" id="table">
        <tr>
          <th class="col-3"><i class="bi bi-clock"></i>予約</th>
          <td class="text-end">
            <form action="{{ route('reserve.delete',['id' => $myReserve->id]) }}" method="POST">
            @csrf
              <button><i class="bi bi-x-circle"></i></button>
            </form>
            <a href="{{ route('reserve.edit',['id' => $myReserve->id]) }}">
              <button><i class="bi bi-pencil-square"></i></button>
            </a>
          </td>
        </tr>
        <tr>
          <th class="text-center">予約者</th>
          <td>{{$myReserve->user->name}}</td>
        </tr>
        <tr>
          <th class="text-center">Date</th>
          <td id="reserveDate">{{$myReserve->reserve_date}}</td>
        </tr>
        <tr>
          <th class="text-center">Time</th>
          <td id="reserveTime">{{$myReserve->reserve_time}}</td>
        </tr>
        <tr>
          <th class="text-center">Number</th>
          <td id="reserveNum">{{$myReserve->reserve_num}}人</td>
        </tr>
      </table>
      @endforeach
      @endif
  </div>
</div>
@endsection
