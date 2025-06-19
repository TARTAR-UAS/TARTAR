<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Pengumuman</title>
    <link rel="stylesheet" href="{{ asset('css/pengumuman/mahasiswa.css') }}">
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

        <div class="pengumuman-container">
            <h2>Pengumuman</h2>
            @foreach($pengumuman as $item)
                <div class="pengumuman-item">
                    <h3>{{ $item->judul }}</h3>
                    <hr>
                    <p>{{ $item->isi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>