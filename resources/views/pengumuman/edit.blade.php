<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Edit Pengumuman</title>
        <link rel='stylesheet' href='{{ asset('css/pengumuman/edit.css') }}'>
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

        <div class="edit-pengumuman-area">
            <h1>Edit Pengumuman</h1>

         <form action="{{ route('pengumuman-update' , ["id" => $pengumuman->id])}}" method="POST">
            @csrf
            @method('PUT')
                <h5>Judul</h5>
                <input type="text" name="judul" value="{{ $pengumuman->judul }}" required><br>
                <h5>Isi: </h5>
                <textarea name="isi" rows="5" required>{{ $pengumuman->isi }}</textarea><br>
            <div class="button-wrapper">
            <button type="submit">Update</button>
         </form>
            <a href="{{ route('pengumuman-admin') }}" class="back-button">Kembali</a>
            </div>
        </div>
    </div>
  </body>
</html>

