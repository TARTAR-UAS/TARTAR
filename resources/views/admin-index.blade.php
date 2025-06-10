<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Admin Index</title>
    <link rel='stylesheet' href='{{ asset('css/admin-index.css') }}'>
    </head>
    <body>
    <div class='parent-containter'>
        <div class ='header'>TARTAR</div>
        <div class= 'navbar-area'>
         <ul id='navbar'>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('biodata-admin') }}">Biodata</a></li>
          <li><a href="/akademik">Akademik</a></li>
          <li><a href="{{ route('pembayaran') }}">Informasi Pembayaran</a></li>
          <li><a href="">About</a></li>
         </ul>
        </div>
         <div class="logout-container">
            @include('logout')
         </div>
         <div class='text-area'>
         <h1 class='welcome-text'>Welcome Back Admin!</h1>
         </div>
    </div>
    </body>
</html>