<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html{
            height: 100%;
        }

        body{
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .header{
            flex: 0 0 auto;
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: center;
            height: 200px;
            background: #0f0c29;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);   /*Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29);/*  W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
        }
       .footer{
            flex: 0 0 auto;
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: center;
            height: 150px;
            background: #bdc3c7;  /*fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);   /*Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2c3e50, #bdc3c7);  /*W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
        }

        .main{
            flex: 1 0 auto;
            display: flex;
            align-items: center;
            align-content: center;
            min-height: 571px;
            justify-content: center;
        }
        .gem-img{
            display: inline;
            height: 30px;
        }
        .people-list{
            height: 40%;
        }

    </style>
</head>

<body>
<header class="header">
    header
</header>
<main>
    <div class="main">
        @yield('content')
    </div>
</main>
<footer class="footer">
    footer
</footer>
</body>

</html>
