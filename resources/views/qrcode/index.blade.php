@extends('layouts.head')
@section('title')
予約詳細画面
@endsection
@section('content')
<div class="container">
  <div class="mt-2">
    <h2>予約詳細</h2>
      @if($reserves == null)
      <div class="col-8 alert alert-info mt-4 text-center" role="alert">
        予約はありません。
      </div>
      @else
      <div class="col-6 mt-4 text-center">
        <table class="text-white table p-2 " id="table">
          <tr>
            <th class="col-3"><i class="bi bi-clock"></i>予約</th>
            <td class="text-end">
            </td>
          </tr>
          <tr>
            <th class="text-center">予約者</th>
            <td>{{$reserves->user->name}}</td>
          </tr>
          <tr>
            <th class="text-center">Date</th>
            <td id="reserveDate">{{$reserves->reserve_date}}</td>
          </tr>
          <tr>
            <th class="text-center">Time</th>
            <td id="reserveTime">{{$reserves->reserve_time}}</td>
          </tr>
          <tr>
            <th class="text-center">Number</th>
            <td id="reserveNum">{{$reserves->reserve_num}}人</td>
          </tr>
        </table>
      </div>
      @endif
  </div>
</div>
@endsection