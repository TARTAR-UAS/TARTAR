@extends('layout-admin')

@section('content')
<div class="container">
    <h2>Tambah Pengumuman</h2>

    <form action="{{ route('pengumuman-store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pengumuman-admin') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
