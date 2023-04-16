@extends('layouts.head')
@section('title')
管理者専用画面
@endsection
@section('content')
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
          <th scope="col">店長</th>
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
          <td></td>
          <td><a href="{{route('admin.edit',['id'=> $shop->id])}}">
            <button class="btn btn-success">編集</button>
          </a></td>
          <td>
            <form action="{{route('admin.delete',['id'=> $shop->id])}}" method="post">
              @csrf
            <button class="btn btn-danger">削除</button>
          </form>
            </td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
</div>
<!-- <script src="{{asset('/js/admin.js')}}"></script> -->
@endsection
