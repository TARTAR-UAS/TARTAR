<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div style="display: flex;">
        <div class="sidebar">
            <ul>
                <li><a href="/lengkapi-data">Lengkapi Data Mahasiswa</a></li>
                <li><a href="/lengkapi-data-ortu">Lengkapi Data Orang Tua</a></li>
                <li><a href="/lengkapi-data-pendidikan">Lengkapi History Pendidikan</a></li>
                <li><a href="/ubah-password">Ubah Password</a></li>
            </ul>
        </div>
        <div class="main">
            @yield('content')
        </div>
    </div>
</body>
</html>
