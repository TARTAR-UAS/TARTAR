@extends('layout-admin')
@section('content')
<h2>Ubah Password</h2>
<form action="/ubah-password" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div>
        <label>Password Baru:</label>
        <input type="password" name="password">
    </div>
    <div>
        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation">
    </div>
    <button type="submit">Simpan</button>
</form>
@endsection
