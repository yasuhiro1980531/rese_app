@extends('layouts.head')
@section('title')
新店舗追加画面
@endsection
@section('content')

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-10 m-auto">
      <h2 class="mb-4">新店舗追加画面</h2>
      <div class="bg-white p-4">
        <form action="" method="post" enctype="multipart/form-data">
          @csrf
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">店名</label>
          <input type="text" name="shop_name" class="form-control" id="exampleFormControlInput1" placeholder="店名を入力してください">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">エリア</label>
          <input type="text" name="area"class="form-control" id="exampleFormControlInput1" placeholder="エリアを入力してください">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">ジャンル</label>
          <select id="genre" name="genre_id" class="form-select">
          <option value="">ジャンルを選択してください</option>
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->name }}</option>
          @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">店舗紹介文</label>
          <textarea type="text" name="text" class="form-control" id="exampleFormControlInput1"  rows="5" placeholder="店舗紹介文を入力してください"></textarea>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">店舗画像</label>
          <input class="form-control" type="file" id="formFile" name="image_url">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">店長名</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="店長名を入力してください">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">メールアドレス</label>
          <input type="email" name="email"class="form-control" id="exampleFormControlInput1" placeholder="メールアドレスを入力してください">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">パスワード</label>
          <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="パスワードを入力してください">
        </div>
        <div class="mb-3">
          <input type="hidden" name="manager_id"class="form-control">
        </div>
        <div class="mt-5 mb-3 text-center">
          <a href="{{ route('admin.add') }}">
            <button class="p-3 btn btn-primary w-50">新規店舗を追加する</button>
          </a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection