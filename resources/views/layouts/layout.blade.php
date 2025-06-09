<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    <link rel="icon" href="{{asset('assets/images/logo.ico')}}">
    <title>@yield('title')</title>
</head>
<body>
<header>
    <div>
        <img src="{{asset('assets/images/logo.png')}}" alt="Logo" width="65">
    </div>
    <nav>
        <a href="{{route('materials.index')}}">Материалы</a>
    </nav>
</header>

<main>
    @yield('content')
</main>
</body>
</html>
