@extends('layouts.head')
@section('title')
予約変更
@endsection
@section('content')
<div style="margin-top:100px;"class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mt-4">
      <div class="card text-center">
        <div class="card-body">
          <div class="p-3">
            <h2 class="mb-3">予約変更</h2>
            <form action="{{ route('reserve.update',['id' => $reserves->id]) }}" method="POST">
              @csrf
              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="mb-3">
              @if ($errors->has('shop_id'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('shop_id') }}</p>
              @endif
              <select name="shop_id" class="form-select mb-3">
              <option value="{{$reserves->shop->id }}">{{ $reserves->shop->shop_name }}</option>
              @foreach($shops as $shop)
              <option value="{{$shop->id }}">{{ $shop->shop_name }}</option>
              @endforeach
            </div>
            <div class="mb-3">
              @if ($errors->has('reserve_date'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('reserve_date') }}</p>
              @endif
              <input id="date" type="date" name="reserve_date" value="{{ $reserves->reserve_date }}" class="form-control">
            </div>
            <div class="mb-3">
                @if ($errors->has('reserve_time'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('reserve_time') }}</p>
                @endif
              <select name="reserve_time" id="time" class="form-select">
                <option value="{{ $reserves->reserve_time }}">{{ $reserves->reserve_time }}</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
              </select>
            </div>
            <div class="mb-3">
                @if ($errors->has('reserve_num'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('reserve_num') }}</p>
                @endif
              <select name="reserve_num" id="num" class="form-select" >
                <option value="{{ $reserves->reserve_num }}">{{ $reserves->reserve_num }}人</option>
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
                <option value="6">6人</option>
              </select>
            </div>
              <button class="btn btn-primary p-2 mt-3">予約を変更する</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection