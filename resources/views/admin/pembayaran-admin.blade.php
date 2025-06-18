<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Pengecekan Pembayawan</title>
    <link rel='stylesheet' href='{{ asset('css/admin/pembayaran.css') }}'>
    </head>

    <body>
        <div class='parent-container'>
         <div class ='sidebar'>
          <div class= 'navbar-area'>
             <div class ='header'>
                <h1>TARTAR</h1>
                <h3>Admin Dashboard</h3>
             </div>
          <ul id='navbar'>
           <li><a href="{{ route('admin-index') }}">Home</a></li>
           <li><a href="{{route('manajemen-akun')}}">Manajemen Akun</a></li>
           <li><a href="{{ route('permintaan-biodata') }}">Biodata</a></li>
           <li><a href="">Akademik</a></li>
           <li><a href="{{ route('pengajuan-studi-admin') }}">Pengajuan Studi</a></li>
           <li><a href="{{ route('list-pembayaran') }}">Informasi</a></li>
           <li><a href="{{ route('pengumuman-admin') }}">Pengumuman</a></li>
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

        <div class = "pembayaran-area">
         <h1>Daftar Pembayaran Mahasiswa</h1>

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
        </div>
      </div>
    </body>
</html>
