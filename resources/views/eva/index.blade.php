@extends('layouts.head')
@section('title')
お店評価画面
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-10 m-auto">
      <h2 class="mb-4">お店評価</h2>
      <div class="bg-white p-4">
        <form action="{{ route('eva.add') }}" method="post">
          @csrf
        <input type="hidden" name="user_id" value= {{$user_id}} >
        <input type="hidden" name="shop_id" value= {{$shop->id }}>
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
        <div class="text-center">
            <button class="p-3 btn btn-primary">評価を投稿する</button>
          </a>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection