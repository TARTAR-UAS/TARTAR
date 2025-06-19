<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informasi Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/pembayaran.css') }}">
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

        <div class="table-pembayaran">
            <h2>Informasi Pembayaran</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Jenis</th>
                        <th>VA</th>
                        <th>Batas</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataPembayaran as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->tahun }}</td>
                        <td>{{ $pembayaran->jenis }}</td>
                        <td>{{ $pembayaran->va }}</td>
                        <td>{{ $pembayaran->batas }}</td>
                        <td>{{ $pembayaran->jumlah }}</td>
                        <td>{{ $pembayaran->bank }}</td>
                        <td>{{ $pembayaran->status }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Belum ada data pembayaran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>