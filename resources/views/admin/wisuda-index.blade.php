<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Wisuda - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/wisuda-index.css') }}">
</head>
<body>
<div class="parent-container">
    <div class="sidebar">
        <div class="navbar-area">
            <div class="header">
                <h1>TARTAR</h1>
                <h3>Admin Dashboard</h3>
            </div>
            <ul id="navbar">
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
    <div class="wisuda-table">
        <h1>DAFTAR PENGAJUAN WISUDA MAHASISWA</h1>

        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif

        @if($data->isEmpty())
            <p>Tidak ada pengajuan wisuda.</p>
        @else
        <div class="pending-table">
            <table>
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>IPK Akhir</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->mahasiswa->nama_depan }} {{ $item->mahasiswa->nama_belakang }}</td>
                            <td>{{ $item->mahasiswa->npm }}</td>
                            <td>{{ $item->ipk_akhir }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') }}</td>
                            <td>
                                <form action="{{ route('admin-wisuda-update', $item->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="status" value="{{ $item->status }}">
                                    <button type="submit">Simpan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
</body>
</html>