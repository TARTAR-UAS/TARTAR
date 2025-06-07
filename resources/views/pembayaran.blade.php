<html>
<head>
    <title>Informasi Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/pembayaran.css') }}">

</head>
<body>
    <h2>Informasi Pembayaran</h2>
    <a href="{{ route('index') }}" class="back-button">Kembali ke Beranda</a>
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
            @foreach($dataPembayaran as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->tahun }}</td>
                    <td>{{ $pembayaran->jenis }}</td>
                    <td>{{ $pembayaran->va }}</td>
                    <td>{{ $pembayaran->batas }}</td>
                    <td>{{ $pembayaran->jumlah }}</td>
                    <td>{{ $pembayaran->bank }}</td>
                    <td>{{ $pembayaran->status }}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>