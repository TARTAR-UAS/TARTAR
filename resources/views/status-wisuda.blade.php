<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Wisuda</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .back-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .card-header {
            background-color: #0069d9;
            color: white;
            text-align: center;
            font-size: 24px;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0056b3;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Tombol Back di pojok kanan atas -->
@auth
    <a href="{{ route('index') }}" class="back-btn">Back</a>
@endauth

<div class="container">
    <h1 class="mt-3">Status Wisuda</h1>
    <div class="card">
        <div class="card-header">
            Status Wisuda Mahasiswa
        </div>
        <div class="card-body">
            @if($mahasiswa)
                <h5 class="card-title">{{ $mahasiswa->nama_depan }} {{ $mahasiswa->nama_belakang }}</h5>
                <p class="card-text">NIM: {{ $mahasiswa->npm }}</p>
                <p class="card-text">Angkatan: {{ $mahasiswa->angkatan }}</p>
                <p class="card-text">Status Wisuda: <strong>{{ $mahasiswa->status_wisuda }}</strong></p>
                
                <!-- Tombol untuk melihat detail status wisuda -->
                <a href="{{ route('status-wisuda', ['id' => $mahasiswa->id]) }}" class="btn btn-primary">Lihat Status Wisuda</a>
            @else
                <p>Data mahasiswa tidak tersedia</p>
            @endif
        </div>
    </div>
</div>

<!-- Link ke Bootstrap JS (untuk interaktivitas) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>