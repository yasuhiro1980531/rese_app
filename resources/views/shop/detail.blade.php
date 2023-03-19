@extends('layouts.head')
@section('title')
店舗詳細
@endsection
<div class="container">
  <div class="row justify-content-around">
    <div class="col-5">
      <h2 class="mb-3">{{ $shop->name }}</h2>
      <img src="{{ $shop->image_url }}" class="w-100 mb-3">
      <div class="d-flex">
        <p>#{{ $shop->area }}</p>
        <p>#{{ $shop->genre->name}}</p>
      </div>
      {{ $shop->text }} 
    </div>
    <div class="col-5" >
      <form class="">
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
            <table class="w-80 text-white table" style="margin:50px 0 80px">
              <tr>
                <th>Shop</th>
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
          <button type="submit" class="btn btn-primary w-100">予約する</button>
        </div>
      </form>
    </div>
  </div>

