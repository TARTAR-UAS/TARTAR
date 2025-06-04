<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>index</title>
    <link rel='stylesheet' href='{{ asset('css/index.css') }}'>
    <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
    </head>
    <body>
        <ul class='navbar'>
         <li><a href="">Home</a></li>
         <li><a href="">News</a></li>
         <li><a href="/akademik">Akademik</a></li>
         <li><a href="">About</a></li>
        </ul>
        <div class="logout-container">
            @include('logout')
        </div>
        <h1 class='welcome-text'>Welcome Back {{$mahasiswa->nama}}</h1>
    </body>
</html>