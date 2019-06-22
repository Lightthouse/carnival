<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/gnome.css">
</head>
<body>
<header class="header">
    <div class="links">
        <a href="/">на главную</a>
    </div>
</header>
<main>
    <div class="main">
        @yield('content')
    </div>
</main>
<footer class="footer"></footer>
<script src="/js/gnome.js"></script>
</body>
</html>
