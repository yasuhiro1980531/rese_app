@extends('layouts.head')
@section('title')
管理者専用画面
@endsection
@section('content')
<div class="container">
  <div class="col-8 m-auto">
    <div class="mt-3 d-flex justify-content-around">
      <h2>管理者専用画面</h2>
      <a href="{{ route('admin.show') }}">
        <button class="btn btn-primary">新規追加</button>
      </a>
    </div>
    <table class="table bg-white text-center align-items-center">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">店名</th>
        <th scope="col">エリア</th>
        <th scope="col">ジャンル</th>
        <th scope="col">編集</th>
        <th scope="col">削除</th>
      </tr>
    </thead>
    <tbody>
      @foreach($shops as $shop)
      <tr>
        <th scope="row">{{ $shop->id}}</th>
        <td>{{ $shop->name}}</td>
        <td>{{ $shop->area}}</td>
        <td>{{ $shop->genre->name }}</td>
        <td><a href="{{route('admin.edit',['id'=> $shop->id])}}">
          <button class="btn btn-success">編集</button>
        </a></td>
        <td>
          <form action="{{route('admin.delete',['id'=> $shop->id])}}" method="post">
            @csrf
          <button id="delete" class="btn btn-danger">削除</button>
        </form>
          </td>
      </tr>
      @endforeach
    </tbody>
    </table>
  </div>
</div>
@endsection
