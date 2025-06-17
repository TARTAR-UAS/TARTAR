<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Permintaan Biodata</title>
        <link rel='stylesheet' href='{{ asset('css/admin/permintaan-biodata.css') }}'>
    </head>
    <body>
    <div class="parent-container">
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

       <div class ="permintaan-area">
         <h1>Daftar Permintaan Perubahan Biodata</h1>

         @if (session('success'))
             <div style="color: green;">{{ session('success') }}</div>
         @elseif (session('error'))
             <div style="color: red;">{{ session('error') }}</div>
         @endif

         @if($permintaan->isEmpty())
            <p>Tidak ada permintaan yang menunggu persetujuan.</p>
         @else
            <table>
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Kategori</th>
                        <th>Data Baru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permintaan as $p)
                        <tr>
                            <td>{{ $p->mahasiswa->nama_depan }} {{ $p->mahasiswa->nama_belakang }}</td>
                            <td>{{ ucfirst($p->kategori) }}</td>
                            <td>
                                <pre>{{ json_encode($p->data_baru, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </td>
                            <td>
                                <form action="{{ route('terima-perubahan' , ["id" => $p->id])}}" method="POST">
                                    @csrf
                                    <button type="submit">Setujui</button><br>
                                </form>

                                <form action="{{ route('tolak-perubahan' , ["id" => $p->id])}}" method="POST">
                                    @csrf
                                    <button type="submit">Tolak</button><br>
                                    <textarea name="alasan-penolakan" placeholder="Tuliskan alasan penolakan di sini"></textarea>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          @endif
        </div>
    </div>
  </body>
</html>