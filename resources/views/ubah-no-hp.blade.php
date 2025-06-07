@extends('layout')
@section('content')
<h2>Ubah Nomor Telepon</h2>
<form action="/ubah-no-hp" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
    <div>
        <label>No HP:</label>
        <input type="text" name="no_telp" value="{{ $mahasiswa->no_telp }}">
    </div>
    <button type="submit">Simpan</button>
</form>
@endsection
