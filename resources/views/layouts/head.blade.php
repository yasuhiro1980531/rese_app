<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" >
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/11453b208c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
    <script src="{{asset('/js/index.js')}}"></script>
</body>
</html>