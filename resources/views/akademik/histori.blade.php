<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Histori Nilai</title>
    <link rel="stylesheet" href="{{ asset('css/akademik/histori.css') }}">
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

        <div class="table-nilai">
            <h2>Histori Nilai Mahasiswa</h2>
            <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($data as $nilai)
                    <tr>
                        <td>{{ $nilai->id }}</td>
                        <td>{{ $nilai->mata_kuliah->nama ?? '-' }}</td>
                        <td>{{ $nilai->mata_kuliah->sks ?? '-' }}</td>
                        <td>{{ $nilai->nilai }}</td>
                    </tr>
                    @empty
                    <tr>
                        <h2>Belum ada data nilai.</h2>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
