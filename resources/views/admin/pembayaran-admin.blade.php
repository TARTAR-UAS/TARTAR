<body>
    <h2>Daftar Pembayaran Mahasiswa</h2>

    <link rel="stylesheet" href="{{ asset('css/pembayaran.css') }}">
    <a href="{{ route('admin-index') }}" class="back-button">Kembali ke Beranda</a>

    @if(session('success'))
        <div class="alert alert-success" style="color: green; margin: 10px 0;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info" style="color: blue; margin: 10px 0;">
            {{ session('info') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" style="color: red; margin: 10px 0;">
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Tahun</th>
                <th>Jenis</th>
                <th>VA</th>
                <th>Batas</th>
                <th>Jumlah</th>
                <th>Bank</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $pembayaran)
            <tr>
                <td>{{ $pembayaran->mahasiswa->nama_depan ?? 'Tidak ditemukan' }} {{ $pembayaran->mahasiswa->nama_belakang ?? '' }}</td>
                <td>{{ $pembayaran->tahun }}</td>
                <td>{{ $pembayaran->jenis }}</td>
                <td>{{ $pembayaran->va }}</td>
                <td>{{ $pembayaran->batas }}</td>
                <td>{{ $pembayaran->jumlah }}</td>
                <td>{{ $pembayaran->bank }}</td>
                <td>{{ $pembayaran->status }}</td>
                <td>
                    @if($pembayaran->status !== 'sudah bayar')
                        <form method="POST" action="{{ route('ubah-status-pembayaran', $pembayaran->id) }}">
                            @csrf
                            <button type="submit">Tandai Lunas</button>
                        </form>
                    @else
                        Sudah lunas
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
