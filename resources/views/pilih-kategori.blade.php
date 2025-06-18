<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Ajukan Perubahan</title>
    <link rel='stylesheet' href='{{ asset('css/pilih-kategori.css') }}'>
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
        <div class="kategori">
        <h2>Ajukan Perubahan Data</h2>
        <h3>Pilih data apa yang ingin diubah</h3>
            <a href="{{ route('form-ajukan', 'mahasiswa') }}"><button>Data Mahasiswa</button></a>
            <a href="{{ route('form-ajukan', 'orangtua') }}"><button>Data Orang Tua</button></a>
            <a href="{{ route('form-ajukan', 'pendidikan') }}"><button>Riwayat Pendidikan</button></a>
        </div>
    </div>
</body>
</html>
