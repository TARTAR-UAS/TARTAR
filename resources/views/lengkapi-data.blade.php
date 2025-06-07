@extends('layout')
@section('content')
<h2>Lengkapi Data Mahasiswa</h2>
<form action="/lengkapi-data" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
    <div>
        <label>NPM:</label>
        <input type="text" name="npm" value="{{ $mahasiswa->npm }}">
    </div>
    <div>
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $mahasiswa->nama }}">
    </div>
    <div>
        <label>Jenis Kelamin:</label>
        <select name="jenis_kelamin">
            <option value="Laki-laki" {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div>
        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}">
    </div>
    <div>
        <label>Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}">
    </div>
    <div>
        <label>Alamat:</label>
        <textarea name="alamat">{{ $mahasiswa->alamat }}</textarea>
    </div>
    <div>
        <label>Angkatan:</label>
        <input type="text" name="angkatan" value="{{ $mahasiswa->angkatan }}">
    </div>
    <div>
        <label>Program Studi:</label>
        <input type="text" name="program_studi" value="{{ $mahasiswa->program_studi }}">
    </div>
    <div>
        <label>Fakultas:</label>
        <input type="text" name="fakultas" value="{{ $mahasiswa->fakultas }}">
    </div>
    <div>
        <label>Status:</label>
        <input type="text" name="status" value="{{ $mahasiswa->status }}">
    </div>
    <button type="submit">Simpan</button>
</form>
@endsection
