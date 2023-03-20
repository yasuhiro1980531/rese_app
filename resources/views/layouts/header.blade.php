@auth
<header class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="col-10">
      <h1 class="header-title">Rese<h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      </div>
    </div>
  </div>
  </header>
  @endauth

  @guest
  <header class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="col-10">
      <h1 class="header-title">Rese<h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent d-flex">
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
        </div>
    </div>
  </div>
  </header>
  @endguest