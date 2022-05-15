<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <ul>
        <li><a href="{{ route('index.index') }}">Главная</a></li>
        <li><a href="{{ route('post.index') }}">Посты</a></li>
        <li><a href="{{ route('contact.index') }}">Контакты</a></li>
        <li><a href="{{ route('about.index') }}">О нас</a></li>
    </ul>
</div>
    @yield('content')
</body>
</html>
