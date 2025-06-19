<html>
<head>
    <meta charset="UTF-8">
    <title>Pengajuan Studi</title>
    <link rel="stylesheet" href="{{ asset('css/pengajuan.css') }}">
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

    <div class="pengajuan-area">
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Pengajuan Studi</h2>
        <h3>Pilih Mata Kuliah (min 3, max 5, total ≤ 20 SKS)</h3>

        <form method="POST" action="{{ route('pengajuan-studi.store') }}">
            @csrf
            <div class="checkbox-group">
                @foreach($mataKuliah as $mk)
                    <div class="checkbox-item">
                        <input type="checkbox" name="mata_kuliah[]" value="{{ $mk->id }}" id="mk{{ $mk->id }}">
                        <label for="mk{{ $mk->id }}">{{ $mk->nama }} ({{ $mk->sks }} SKS)</label>
                    </div>
                @endforeach
            </div>
            <br>
            <button type="submit" class="submit-button">Ajukan</button>
        </form>
    </div>
</div>
</body>
</html>