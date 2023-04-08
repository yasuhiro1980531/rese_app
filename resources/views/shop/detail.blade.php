@extends('layouts.head')
@section('title')
店舗詳細
@endsection
@section('content')
<body>
<div class="container">
@extends('layouts.sidebar')
  <div class="row justify-content-around">
    <div class="col-5">
      <div class="d-flex">
        <a href="{{route('shop.index')}}"><i class="bi bi-chevron-left return_btn"></i></a>
      <h2 class="mb-3">{{ $shop->name }}</h2>
      </div>
      <img src="{{ asset($shop->image_url) }}" class="w-100 mb-3">
      <div class="d-flex">
        <p>#{{ $shop->area }}</p>
        <p>#{{ $shop->genre->name}}</p>
      </div>
      {{ $shop->text }} 
    </div>
    @auth
    <div class="col-5" >
      <form method="post" action="{{ route('reserve.done') }}">
        @csrf
        <div class="reserve">
          <div class="p-3">
            <h2 class="mb-3 text-white">予約</h2>
            <div class="mb-3">
              <input type="hidden" name="user_id" value="{{ Auth::id() }}">
              <input type="hidden" name="shop_id" value="{{ $shop->id }}">
              @if ($errors->has('reserve_date'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('reserve_date') }}</p>
                @endif
              <input id="date" type="date" name="reserve_date" value="{{old('reserve_date')}}" class="form-control">
            </div>
            <div class="mb-3">
                @if ($errors->has('reserve_time'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('reserve_time') }}</p>
                @endif
              <select name="reserve_time" id="time" class="form-select">
                <option value="">予約時間</option>
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
              <select name="reserve_num" id="num" class="form-select">
                <option value="">予約人数</option>
                <option value="1">1人</option>
                <option value="2">2人</option>
                <option value="3">3人</option>
                <option value="4">4人</option>
                <option value="5">5人</option>
                <option value="6">6人</option>
              </select>
            </div>
            <table class="text-white table" id="table">
              <tr>
                <th class="col-4">Shop</th>
                <td>{{ $shop->name }}</td>
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
            <button class="btn btn-primary w-100 reserve_btn">予約する</button>
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
  <script src="{{asset('/js/reserve.js')}}"></script>
</body>
@endsection

