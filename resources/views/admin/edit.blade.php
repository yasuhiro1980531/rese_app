@extends('layouts.head')
@section('title')
店舗情報変更
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 m-auto mt-5">
      <div class="card text-center">
        <div class="card-body">
          <div class="p-3">
            <h2 class="mb-3">店舗情報変更</h2>
            <form action="{{ route('admin.update',['id' => $shops->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="mb-3 text-start">
              <label class="form-label">店名</label>
              @if ($errors->has('shop_name'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('shop_name') }}</p>
              @endif
              <input type="text" name="shop_name" value="{{ old('shop_name',$shops->shop_name) }}" class="form-control">
            </div>
            <div class="mb-3 text-start">
              <label class="form-label">エリア</label>
              @if ($errors->has('area'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('area') }}</p>
              @endif
              <input type="text" name="area" value="{{old('area',$shops->area) }}" class="form-control">
            </div>
            <div class="mb-3 text-start">
              <label class="form-label">ジャンル</label>
              @if ($errors->has('genre'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('genre') }}</p>
              @endif
              <select id="genre" name="genre_id" class="form-select">
              <option value="{{$shops->genre->id}}">{{$shops->genre->name}}</option>
              @foreach($genres as $genre)
              <option value="{{$genre->id}}" @if( $genre->id == old('genre_id')) selected @endif>{{ $genre->name }}</option>
              @endforeach
              </select>
            </div>
            <div class="mb-3 text-start">
              <label class="form-label">店舗紹介文</label>
              @if ($errors->has('text'))
                <p class="alert alert-danger mt-2">
                  {{ $errors->first('text') }}</p>
              @endif
              <textarea name="text" class="form-control" cols="30" rows="6" maxlength="255">{{ old('text',$shops->text) }}</textarea>
            </div>
            <div class="mb-5 text-start">
              <p>現在の店舗画像</p>
              <img src="{{ \Storage::url($shops->image_url) }}" class="w-50">
            </div> 
            <div class="mb-3">
              <p class="text-start text-danger">画像を変更したい場合はこちらから選択してください</p>
              <input class="form-control" type="file" value="{{ $shops->image_url }}" id="formFile" name="image_url">
            </div> 
              <button class="btn btn-primary p-2 mt-3">店舗情報を更新する</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection