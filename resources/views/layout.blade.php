<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="d-flex">
        <div class="sidebar p-3 bg-light">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="/biodata">Biodata</a></li>
                <li class="nav-item"><a class="nav-link" href="/lengkapi-data">Lengkapi Data</a></li>
                <li class="nav-item"><a class="nav-link" href="/ubah-no-hp">Ubah No HP</a></li>
                <li class="nav-item"><a class="nav-link" href="/ubah-password">Ubah Password</a></li>
            </ul>
        </div>
        <div class="main flex-grow-1 p-3">
            @yield('content')
        </div>
    </div>
</body>
</html>
