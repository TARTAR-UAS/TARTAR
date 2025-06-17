@extends('layout-admin')

@section('content')
<div class="container">
    <h2>Edit Pengumuman</h2>

    <form action="{{ url('/admin/pengumuman/' . $pengumuman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $pengumuman->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ $pengumuman->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengumuman-admin') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
