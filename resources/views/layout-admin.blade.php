<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Aplikasi Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div style="display: flex;">
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('admin-index') }}">Dashboard</a></li>
                <li><a href="{{ route('permintaan-biodata') }}">Permintaan Perubahan</a></li>
            </ul>
        </div>
        <div class="main">
            @yield('content')
        </div>
    </div>
</body>
</html>