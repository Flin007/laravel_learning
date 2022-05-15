<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">First Laravel project</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('index.index') ? 'active' : '' }}" href="{{ route('index.index') }}">Главная</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('post.index') ? 'active' : '' }}" href="{{ route('post.index') }}">Посты</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">Контакты</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('about.index') ? 'active' : '' }}" href="{{ route('about.index') }}">О нас</a></li>
        </ul>
    </header>
</div>
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
</body>
</html>
