<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Akademik</title>
  
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="navbar-logo">Akademik</a>
        
        <div class="menu-toggle" id="mobile-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
        <ul class="navbar-links" id="nav-links">
            <li><a href="">Dashboard</a></li>
            <li class="dropdown">
                <a href="#">Akademik</a>
                <div class="dropdown-content">
                    <a href=" }}"> Jadwal Kuliah</a>
                    <a href="">Histori Nilai</a>
                    <a href="">Kartu studi  Mahasiswa</a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Konten Halaman -->
    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScript untuk Navbar Mobile -->
    <script>
        document.getElementById('mobile-menu').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('active');
            this.classList.toggle('active');
        });
    </script>

    <!-- Script lain jika ada -->
    @stack('scripts')
</body>
</html>