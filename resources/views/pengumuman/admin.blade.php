<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Kelola Pengumuman</title>
        <link rel='stylesheet' href='{{ asset('css/pengumuman/admin.css') }}'>
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
        
        <div class = 'pengumuman-area'>
         <h1>Kelola Pengumuman</h1>
         <a href="{{ route('pengumuman-create') }}" class="add-button"><button>Tambah Pengumuman</button></a>

         <div class = 'pengumuman-inti'>
         @foreach($pengumuman as $item)
                 <h3>{{ $item->judul }}</h3>
                 <p>{{ $item->isi }}</p>

                 <a href="{{ route('pengumuman-edit', ["id" => $item->id])}}"><button>Edit</button></a>
                 <form action="{{ route('pengumuman-delete', ["id" => $item->id])}}" method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" onclick="return confirm('Yakin?')">Hapus</button>
                 </form>
         @endforeach
         </div>
        </div>
    </div>
    </body>
</html>

