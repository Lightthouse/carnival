<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        header{
            height :200px;
            background-image:url(https://now.guidetoiceland.is/wp-content/uploads/2018/12/elves-750x400.jpg);
            background-size: contain;
        }
        footer{
            height: 300px;
            background-image: url(http://media.wizards.com/images/dnd/newtodnd/NEW_TO_DD_Races_Elf.png);
            background-size: contain;
        }

        main{
            display: flex;
            justify-content: center;
            justify-items: center;
        }
        .main{
            display: flex;
            flex-direction: column;
        }
        img{
            height: 50%;

        }

    </style>
</head>

<body>
<header></header>
<main>
    <div class="main">
        @yield('content')
    </div>
    <img src="https://c7.uihere.com/files/677/79/749/dungeons-dragons-pathfinder-roleplaying-game-bard-half-elf-dnd-thumb.jpg" alt="man">
</main>
<footer></footer>
</body>
</html>
