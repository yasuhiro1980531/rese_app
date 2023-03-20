@extends('layouts.head')
@section('title')
店舗一覧
@endsection
@section('content')
<div class="container">
@extends('layouts.header')
<div class="row justify-content-end mb-2">
  <div class="col-sm-3">
    <select class="form-select" aria-label="Default select example">

  <option selected>All area</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  </div>
  <div class="col-sm-3">
    <select class="form-select" aria-label="Default select example">

  <option selected>All genre</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
  </div>
  <div class="col-sm-5">
    <input type="text" class="form-control" placeholder="Search ..." aria-label="Zip">
  </div>
</div>

</div>
  <div class="row row-cols-5 justify-content-center">
    @foreach($shops as $shop)
    <div class="card m-2" style="width: 18rem;">
      <img src="{{$shop->image_url}}">
        <div class="p-3"> 
          <h2 class="fw-bold">{{$shop->name}}</h2>
          <div class="d-flex">
            <p class=mr-1>#{{$shop->area}}</p>
            <p>#{{$shop->genre->name}}</p>
          </div>
          <div class="d-flex justify-content-between">
            <a href="{{ route('shop.detail', ['id'=>$shop->id]) }}" class="btn btn-primary">詳しく見る</a>
            <i class="fa fa-regular fa-heart"></i>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
