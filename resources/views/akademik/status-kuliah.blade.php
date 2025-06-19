<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Jadwal Kuliah</title>
    <link rel="stylesheet" href="{{ asset('css/akademik/status.css') }}">
</head>
<body>
    <div class="parent-container">
        <div class="header">TARTAR</div>

        <div class="navbar-area">
            <ul id="navbar">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('biodata') }}">Biodata</a></li>
                <li><a href="{{ route('akademik') }}">Akademik</a></li>
                <li><a href="{{ route('pembayaran') }}">Pembayaran</a></li>
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
        
        <div class="button-wrapper">
        <a href='{{route('akademik')}}'><button type="button"> Kembali </button></a>
        </div>

        <div class="status-text">
            <h2>Status Kuliah: {{$mahasiswa->status_perkuliahan}}</h2>
            @if($mahasiswa->status_perkuliahan == 'Aktif')
             <p>Anda masih menjadi mahasiswa TARTAR angkatan {{$mahasiswa->angkatan}}</p>
            @else
             <p>Akun anda sudah tidak bisa menjalankan beberapa fitur karena anda sudah lulus</p>
            @endif
        </div>
    </div>
</body>
</html>

