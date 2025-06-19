<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Admin - Pengajuan Studi</title>
    <link rel='stylesheet' href='{{ asset('css/admin/pengajuan-studi.css') }}'>
</head>
<body>
<div class='parent-container'>
    <div class ='sidebar'>
        <div class='navbar-area'>
            <div class='header'>
                <h1>TARTAR</h1>
                <h3>Admin Dashboard</h3>
            </div>
            <ul id='navbar'>
           <li><a href="{{ route('admin-index') }}">Home</a></li>
           <li><a href="{{ route('manajemen-akun') }}">Manajemen Akun</a></li>
           <li><a href="{{ route('permintaan-biodata') }}">Biodata</a></li>
           <li><a href="{{ route('pengajuan-studi-admin') }}">Pengajuan Studi</a></li>
           <li><a href="{{ route('list-pembayaran') }}">Informasi</a></li>
           <li><a href="{{ route('pengumuman-admin') }}">Pengumuman</a></li>
           <li><a href="{{ route('admin-wisuda-index') }}">Status Wisuda</a></li>
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

    <div class='content-area'>
        <h1>Daftar Pengajuan Studi Mahasiswa</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($pengajuan->isEmpty())
            <p>Tidak ada pengajuan studi yang menunggu.</p>
        @else
            @foreach($pengajuan as $item)
                <div class="pengajuan-box">
                    <h3>{{ $item->mahasiswa->nama_depan }} {{ $item->mahasiswa->nama_belakang }}</h3>
                    <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
                    <p><strong>Catatan Mahasiswa:</strong> {{ $item->catatan_mahasiswa ?? '-' }}</p>
                    <p><strong>Biaya:</strong> Rp{{ number_format($item->biaya, 0, ',', '.') }}</p>
                    <p><strong>Total SKS:</strong> {{ $item->mataKuliah->sum('sks') }}</p>

                    <ul>
                        @foreach($item->mataKuliah as $mk)
                            <li>{{ $mk->nama }} ({{ $mk->sks }} SKS)</li>
                        @endforeach
                    </ul>

                    <form method="POST" action="{{ route('setujui-pengajuan-studi', $item->id) }}" style="margin-bottom: 10px;">
                        @csrf
                        <label>Catatan (opsional):</label>
                        <input type="text" name="catatan_admin" style="width: 100%;" placeholder="Catatan admin (opsional)">
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>

                    <form method="POST" action="{{ route('tolak-pengajuan-studi', $item->id) }}">
                        @csrf
                        <label>Alasan Penolakan:</label>
                        <textarea name="catatan_admin" required style="width: 100%;"></textarea>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                    <hr>
                </div>
            @endforeach
        @endif
    </div>
</div>
</body>
</html>