@extends('layouts.head')
@section('title')
メニュー
@endsection
@section('content')
  @auth
  <div style="margin-top:100px;"class="container">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('shop.index')}}">Home</a>
      </li>
      <li class="nav-item">
        <form action="/logout" method="post">
        @csrf
        <input class="logout nav-link" type="submit" value="Logout">
        </form>     
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('mypage')}}">Mypage</a>
      </li>
    </ul>
  </div>
  @endauth
  @guest
  <div style="margin-top:100px;"class="container">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('shop.index')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}">Login</a>
      </li>
    </ul>
  </div>
  @endguest
@endsection