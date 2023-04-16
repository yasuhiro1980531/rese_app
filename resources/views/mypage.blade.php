@extends('layouts.head')
@section('title')
マイページ
@endsection
@section('content')
@if (auth()->user()->role === 'manager')
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
      @if($myReserve == null)
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
@endif

@if (auth()->user()->role === 'administrator')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-10 m-auto">
      <h2 class="mb-5">管理者専用画面</h2>
      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.show') }}">
          <button class="btn btn-primary btn-lg">新規店舗追加</button>
        </a>
        <a href="{{ route('shop.index') }}">
          <button class="btn btn-secondary btn-lg">店舗一覧画面へ</button>
        </a>
      </div>
      <table class="table bg-white text-center align-items-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">店名</th>
          <th scope="col">エリア</th>
          <th scope="col">ジャンル</th>
          <th scope="col">店長ID</th>
          <th scope="col">編集</th>
          <th scope="col">削除</th>
        </tr>
      </thead>
      <tbody>
        @foreach($shops as $shop)
        <tr>
          <th scope="row">{{ $shop->id}}</th>
          <td>{{ $shop->shop_name}}</td>
          <td>{{ $shop->area}}</td>
          <td>{{ $shop->genre->name }}</td>
          <td>{{ $shop->manager_id}}</td>
          <td><a href="{{route('admin.edit',['id'=> $shop->id])}}">
            <button class="btn btn-success">編集</button>
          </a></td>
          <td>
            <form action="{{route('admin.delete',['id'=> $shop->id])}}" method="post">
              @csrf
            <button id="deleteBtn" class="btn btn-danger">削除</button>
          </form>
            </td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
</div>
@endif

@if (auth()->user()->role === 'user')
<div class="container">
@extends('layouts.sidebar')
  <div class="row justify-content-center">
    <div class="col-6"></div>
    <div class="col-6">
      <h2 class="">{{$user->name}}さん</h2>
    </div>
    <div class="col-6">
      <h2>予約一覧</h2>
      @if($reserve !== null)
      @foreach($reserves as $reserve)
      @if($date >= $reserve->reserve_date)
      <div class="card text-center mb-5">
        <div class="card-body p-3">
          <p class="card-text">{{$reserve->reserve_date}}に訪れた<span class="fw-bold">{{$reserve->shop->shop_name}}</span>はいかがでしたか？</p>
          <form action="{{ route('eva.add') }}" method="post">
            @csrf
          <input type="hidden" name="user_id" value= {{$reserve->user_id}} >
          <input type="hidden" name="shop_id" value= {{$reserve->shop_id }}>
          <div class="mb-3">
            <label class="form-label">満足度</label>
            <select name="level" class="form-select">
            <option value="">お店の満足度を５段階で評価してください</option>
            <option value="5">5(とても満足)</option>
            <option value="4">4(まあまあ満足)</option>
            <option value="3">3(普通)</option>
            <option value="2">2(まあまあ不満)</option>
            <option value="1">1(とても不満)</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="form-label">コメント</label>
            <textarea type="text" name="comment" class="form-control" rows="5" placeholder="コメントを入力してください"></textarea>
          </div>
          <div class="d-flex justify-content-around mb-3">
            <button class="btn btn-primary">評価する</button>
          </form>
          <form action="{{ route('reserve.delete',['id' => $reserve->id]) }}" method="POST">
            @csrf
              <button class="btn btn-secondary">評価しない</button>
          </form>
          </div>
        </div>
      </div>
      @else
      <table class="text-white table p-2" id="table">
        <tr>
          <th class="col-3"><i class="bi bi-clock"></i>予約</th>
          <td class="text-end">
            <form action="{{ route('reserve.delete',['id' => $reserve->id]) }}" method="POST">
            @csrf
              <button><i class="bi bi-x-circle"></i></button>
            </form>
            <a href="{{ route('reserve.edit',['id' => $reserve->id]) }}">
              <button><i class="bi bi-pencil-square"></i></button>
            </a>
          </td>
          
        </tr>
        <tr>
          <th class="text-center">Shop</th>
          <td>{{$reserve->shop->shop_name}}</td>
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
      @endif
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
        @if($likes !== null)
        @foreach($likes as $like)
        <div class="card m-2" style="width: 16rem;">
          <img src="{{ \Storage::url($like->shop->image_url) }}" style="padding-top:10px;">
            <div class="p-3"> 
              <h2 class="fw-bold">{{$like->shop->shop_name}}</h2>
              <div class="d-flex">
                <p class=mr-1>#{{$like->shop->area}}</p>
                <p>#{{$like->shop->genre->name}}</p>
              </div>
              <div class="d-flex justify-content-between">
                <a href="{{ route('shop.detail', ['id'=>$like->shop->id]) }}" class="btn btn-primary">詳しく見る</a>
                <a href="{{ route('mypage.likeDelete',$like) }}">
                  <button><i class="fa fa-solid fa-heart" style="color: #f96262;"></i></button>
                  </a>
              </div>
            </div>
        </div>
        @endforeach
        @else
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
                  <a href="{{ route('like', $like) }}">
                  <button><i id="heart" class="fa fa-regular fa-heart"></i></button>
                  </a>
              </div>
            </div>
        </div>
        @endforeach
        @endif
      </div>
      @else
        <div class="col-8 alert alert-info mt-4 text-center" role="alert">
          お気に入り店舗はありません。
        </div>
      @endif
    </div>
  </div>
</div>
@endif
@endsection
