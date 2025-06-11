<body>
    <h2>Daftar Pembayaran Mahasiswa</h2>
    <link rel="stylesheet" href="{{ asset('css/pembayaran.css') }}">
    <a href="{{ route('admin-index') }}" class="back-button">Kembali ke Beranda</a>
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
                <td>{{ $pembayaran->mahasiswa->nama_depan?? 'Tidak ditemukan' }} {{ $pembayaran->mahasiswa->nama_belakang ?? '' }}</td>
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
