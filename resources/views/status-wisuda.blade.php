<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Wisuda</title>
    <link rel="stylesheet" href="{{ asset('css/status-wisuda.css') }}">
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

        <div class="wisuda-container">
            <h2>Status Wisuda</h2>

            <div class="card">
                    @if($mahasiswa && $mahasiswa->wisuda)
                        <h5>{{ $mahasiswa->nama_depan }} {{ $mahasiswa->nama_belakang }}</h5>
                        <p><span>NIM: </span>{{ $mahasiswa->npm }}</p>
                        <p><span>Angkatan: </span>{{ $mahasiswa->angkatan }}</p>
                        <p><span>IPK Akhir: </span>{{ $mahasiswa->wisuda->ipk_akhir ?? 'Belum tersedia' }}</p>
                        <p><span>Tanggal Pengajuan: </span>{{ $mahasiswa->wisuda->tanggal_pengajuan ?? 'Belum tersedia' }}</p>
                        <p><span>Status Wisuda: </span><strong>{{ $mahasiswa->wisuda->status }}</strong></p>
                    @else
                        <span>Belum ada data pengajuan wisuda.</span>
                        <div class="button-wrapper">
                        <a href='{{route('form-wisuda')}}'><button type="button"> Ajukan Wisuda </button></a>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</body>
</html>