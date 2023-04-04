@section('sidebar')
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
  <div class="sidebar col-2 position-absolute">
    <ul class="navbar-nav p-3 mb-2 bg-light">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('shop.index')}}">Home</a>
      </li>
      <li class="nav-item">
        <form action="/logout" method="post">
        @csrf
        <input class="logout nav-link bg-light" type="submit" value="Logout">
        </form>     
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('mypage')}}">Mypage</a>
      </li>
    </ul>
  </div>
    @endauth
    @guest
  <div class="sidebar col-3 position-absolute">
    <ul class="navbar-nav p-3 mb-2 bg-light">
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
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('/js/sidebar.js')}}"></script>
@endsection