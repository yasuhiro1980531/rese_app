<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet" >
    <link href="/css/sidebar.css" rel="stylesheet" >


  </head>
  <body>
    <header class="bg-gray">
      <nav class="navbar navbar-light">
        <div class="container-fluid">
          <div class="d-flex mt-2">
            <i class="sidebar-toggler si bi-list h2 me-3"></i>
            <h2 style="color:blue;">Rese</h2>
          </div>
        </div>
      </nav>
    </header>
    <main class="position-relative">
      @auth
      <div class="sidebar col-4 position-absolute">
        <ul class="navbar-nav p-3 mb-2 mb-lg-0">
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
      <div class="sidebar col-4 position-absolute">
        <ul class="navbar-nav p-3 mb-2 mb-lg-0">
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
    </main>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('/js/sidebar.js')}}"></script>
  </body>
</html>











<!-- <header class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="col-10 d-flex">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="header-title">Rese<h1>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
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
        @endauth
        @guest
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
        @endguest
      </div>
    </div>
  </div>
</header> -->