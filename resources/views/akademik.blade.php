<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Akademik</title>
  <link rel="stylesheet" href="{{ asset('css/akademik.css') }}">
</head>
<body>
<div class="parent-container">
    <div class="header">TARTAR</div>

    <div class="navbar-area">
        <ul id="navbar">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('biodata') }}">Biodata</a></li>
            <li><a href="{{ route('akademik') }}">Akademik</a></li>
            <li><a href="{{ route('pembayaran') }}">Informasi Pembayaran</a></li>
            <li><a href="{{ route('pengajuan-studi')}}">PengajuanStudi</a></li>
            <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
            <li><a href="{{ route('status-wisuda') }}">Status Wisuda</a></li>
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

     <div class="menu-akademik">
        <h2>Menu Akademik</h2>
        <div class="menu-list">
            <a href="{{ route('akademik.histori') }}" class="menu-item">Histori Nilai</a>
            <a href="{{ route('akademik.jadwal') }}" class="menu-item">Jadwal Kuliah</a>
            <a href="{{ route('akademik.status-kuliah') }}" class="menu-item">Status Kuliah</a>
        </div>
    </div>
</div>
</body>
</html>