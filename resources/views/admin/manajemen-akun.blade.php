<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Manajemen Akun</title>
    <link rel='stylesheet' href='{{ asset('css/admin/manajemen-akun.css') }}'>
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

        <div class='verification-area'>
            <h1> DAFTAR AKUN YANG PERLU DI-VERIFIKASI </h1>
            @if ($mahasiswaPending->isEmpty())
                <p>Semua akun telah di-verifikasi!</p>
            @else
             <div class="pending-table">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswaPending as $mhs)
                            <tr>
                                <td> {{$mhs->nama_depan}} </td>
                                <td> {{$mhs->nama_belakang}} </td>
                                <td> {{$mhs->jenis_kelamin}} </td>
                                <td> {{$mhs->agama}} </td>
                                <td> {{$mhs->tanggal_lahir}} </td>
                                <td> {{$mhs->tempat_lahir}} </td>
                                <td> {{$mhs->fakultas}} </td>
                                <td> {{$mhs->program_studi}} </td>
                                <td> 
                                    <form action='{{route('terima-verifikasi', ['id' => $mhs->id])}}' method='POST'>
                                        @csrf
                                        <button type='submit'>Verifikasi</button>
                                    </form> 
                                    <form action='{{route('tolak-verifikasi', ['id' => $mhs->id])}}' method='POST'>
                                        @csrf
                                        <button type='submit'>Tolak</button>
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