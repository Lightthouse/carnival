<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .header{
            height :200px;
            background: #000000;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #e74c3c, #000000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #e74c3c, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .footer{
            height: 150px;
            background: #232526;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #414345, #232526);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #414345, #232526); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        .main{
            background-image: url(https://cdn.pixabay.com/photo/2017/07/13/13/28/paper-2500380_960_720.jpg);
            background-size: cover;
            display: flex;
            justify-content: center;
            place-items: center;
        }
        .gnome-pict{
            max-height: 700px;
            margin: 0 30px;
        }
        .marker-text{
            font-weight: bold;
            display: block;
        }
    </style>
</head>

<body>
<header class="header"></header>
<main>
    <div class="main">
        @yield('content')
    </div>
</main>
<footer class="footer"></footer>
</body>
</html>
