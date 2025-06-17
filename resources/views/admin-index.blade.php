<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Admin Index</title>
    <link rel='stylesheet' href='{{ asset('css/admin-index.css') }}'>
    </head>
    <body>
    <div class='parent-container'>
        <div class ='sidebar'>
         <div class= 'navbar-area'>
             <div class ='header'>
                <h1>TARTAR</h1>
                <h3>Admin Dashboard</h3>
             </div>
          <ul id='navbar'>
           <li><a href="{{ route('admin-index') }}">Home</a></li>
           <li><a href="{{ route('manajemen-akun') }}">Manajemen Akun</a></li>
           <li><a href="{{ route('permintaan-biodata') }}">Biodata</a></li>
           <li><a href="">Akademik</a></li>
           <li><a href="{{ route('list-pembayaran') }}">Informasi</a></li>
           <li><a href="{{ route('pengumuman-admin') }}">Pengumuman</a></li>
         </ul>
         </div>
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
          <h1 class='welcome-text'>Welcome Back Admin!</h1>
          <p class='pending-account-text'>Ada sekitar <span class="pending-number">{{$mahasiswaPending}}</span> akun yang belum di verifikasi,
           pergilah ke menu Manajemen Akun untuk mengecek akun!</p>
         </div>
    </div>
    </body>
</html>