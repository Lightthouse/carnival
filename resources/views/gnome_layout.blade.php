<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        header{
            height :200px;
            background-image:url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/bfba1e0a-4385-41b5-a601-4606b6603bed/d34t697-8a2288e2-d3bf-43a8-82fa-ef198de6745d.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2JmYmExZTBhLTQzODUtNDFiNS1hNjAxLTQ2MDZiNjYwM2JlZFwvZDM0dDY5Ny04YTIyODhlMi1kM2JmLTQzYTgtODJmYS1lZjE5OGRlNjc0NWQuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.zHP5FprEo2mi9Gjk-OcyQxubuYlYVgcxQaO66VzENj0);
            background-size: contain;
        }
        footer{
            height: 300px;
            background-image: url(https://i.ytimg.com/vi/5-DCyuSU20E/hqdefault.jpg);
            background-size: contain;
        }

        main{
            display: flex;
            justify-content: center;
            justify-items: center;
        }
        .main{
            display: flex;

            place-items: center;
            margin: 20px 30px;
            /*flex-direction: column;*/
        }
        .gnome-pict{
            margin: 20px 30px;
        }
        .marker-text{
            font-weight: bold;
            display: block;
        }

    </style>
</head>

<body>
<header></header>
<main>
    <div class="main">
        @yield('content')
    </div>
</main>
<footer></footer>
</body>
</html>
