<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>index</title>
    <link rel='stylesheet' href='{{ asset('css/index.css') }}'>
    </head>
    <body>
    <div class='parent-container'>
        <div class ='header'>TARTAR</div>
        <div class= 'navbar-area'>
         <ul id='navbar'>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('biodata') }}">Biodata</a></li>
          <li><a href="{{ route('akademik') }}">Akademik</a></li>
          <li><a href="{{ route('pembayaran') }}">Informasi Pembayaran</a></li>
          <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
         </ul>
        </div>
        @auth
         <div class="logout-container">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                 <button type="submit" class="logout-button">Logout</button>
            </form>
          </div>
        @endauth
         <div class='text-area'>
         <h1 class='welcome-text'>Welcome Back {{$mahasiswa->nama_depan}}</h1>
         </div>
    </div>
    </body>
</html>