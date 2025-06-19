<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Jadwal Kuliah</title>
    <link rel="stylesheet" href="{{ asset('css/akademik/jadwal.css') }}">
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
        
        <div class="table-jadwal">
         <h2>Jadwal Kuliah</h2>
         <table>
             <thead>
             <tr>
                <th>Hari</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Mata Kuliah</th>
                <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $item)
                <tr>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jam_mulai }}</td>
                    <td>{{ $item->jam_selesai }}</td>
                    <td>{{ $item->mata_kuliah }}</td>
                    <td>{{ $item->ruang}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>
