<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Tambah Pengumuman</title>
        <link rel='stylesheet' href='{{ asset('css/pengumuman/create.css') }}'>
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
           <li><a href="{{route('manajemen-akun')}}">Manajemen Akun</a></li>
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

      <div class="tambah-pengumuman-area">
        <h1>Tambah Pengumuman</h1>

        <form action="{{ route('pengumuman-store') }}" method="POST">
            @csrf

                <h5>Judul:</h5>
                <input type="text" name="judul" required><br>
                <h5>Isi:</h5>
                <textarea name="isi" rows="5" required></textarea><br>
        <div class="button-wrapper">
                <button type="submit">Simpan</button>
        </form>
            <a href="{{ route('pengumuman-admin') }}" class="back-button">Kembali</a>
        </div>
      </div>
    </div>
 </body>
</html>

