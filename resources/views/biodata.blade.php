@extends('layout')
@section('content')
<h2>Biodata Mahasiswa</h2>
<p><strong>NPM:</strong> {{ $mahasiswa->npm }}</p>
<p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
<p><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jenis_kelamin }}</p>
<p><strong>Tanggal Lahir:</strong> {{ $mahasiswa->tanggal_lahir }}</p>
<p><strong>Tempat Lahir:</strong> {{ $mahasiswa->tempat_lahir }}</p>
<p><strong>Alamat:</strong> {{ $mahasiswa->alamat }}</p>
<p><strong>No Telp:</strong> {{ $mahasiswa->no_telp }}</p>
<p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
<p><strong>Program Studi:</strong> {{ $mahasiswa->program_studi }}</p>
<p><strong>Fakultas:</strong> {{ $mahasiswa->fakultas }}</p>
<p><strong>Status:</strong> {{ $mahasiswa->status }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Kelas:</strong> {{ $user->kelas }}</p>
@endsection
