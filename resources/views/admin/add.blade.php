@extends('layouts.head')
@section('title')
新店舗追加画面
@endsection
@section('content')

<div class="container">
  <div class="col-8 m-auto">
  <h2 class="mt-3 mb-3">新店舗追加画面</h2>
    <div class="bg-white p-3">
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">店名</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="店名を入力してください">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">エリア</label>
        <input type="text" name="area"class="form-control" id="exampleFormControlInput1" placeholder="エリアを入力してください">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">ジャンル</label>
        <input type="text" name="genre_id" class="form-control" id="exampleFormControlInput1" placeholder="ジャンルを入力してください">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">店舗紹介文</label>
        <input type="text" name="text" class="form-control" id="exampleFormControlInput1" placeholder="店舗紹介文を入力してください">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">店舗画像</label>
        <input class="form-control" type="file" id="formFile" name="image_url">
      </div> 
      <div class="mt-5 text-center">
        <a href="{{ route('admin.add') }}">
          <button class="p-3 btn btn-primary w-50">新規店舗を追加</button>
        </a>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection