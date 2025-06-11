@extends('layout')

@section('content')
<div class="container mt-4">
    <a href="{{ route('index') }}" class="btn btn-secondary mb-3">Kembali ke Beranda</a>
    <h2>Biodata Mahasiswa</h2>
    <table class="table table-bordered">
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $mahasiswa->nama_depan }} {{ $mahasiswa->nama_belakang }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $mahasiswa->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Agama</th>
            <td>{{ $mahasiswa->agama }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $mahasiswa->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $mahasiswa->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $mahasiswa->alamat }}</td>
        </tr>
        <tr>
            <th>No Telp</th>
            <td>{{ $mahasiswa->no_telp }}</td>
        </tr>
        <tr>
            <th>Angkatan</th>
            <td>{{ $mahasiswa->angkatan }}</td>
        </tr>
        <tr>
            <th>Program Studi</th>
            <td>{{ $mahasiswa->program_studi }}</td>
        </tr>
        <tr>
            <th>Fakultas</th>
            <td>{{ $mahasiswa->fakultas }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $mahasiswa->status }}</td>
        </tr>
    </table>

    <h3>Data Orang Tua</h3>
    <table class="table table-bordered">
        <tr>
            <th>Nama Ayah</th>
            <td>{{ $mahasiswa->orangtua->nama_ayah }}</td>
       </tr>
        <tr>
            <th>No Telp Ayah</th>
            <td>{{ $mahasiswa->orangtua->no_telp_ayah }}</td>
        </tr>
        <tr>
            <th>Nama Ibu</th>
            <td>{{ $mahasiswa->orangtua->nama_ibu }}</td>
        </tr>
        <tr>
            <th>No Telp Ibu</th>
            <td>{{ $mahasiswa->orangtua->no_telp_ibu }}</td>
        </tr>
    </table>

    <h3>Riwayat Pendidikan</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Nilai Akhir</th>
                <th>Tanggal Lulus</th>
                <th>Jenis Sekolah</th>
                <th>Jurusan</th>
                <th>Lokasi Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa->histori_pendidikan as $index => $pendidikan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pendidikan->nama_sekolah }}</td>
                <td>{{ $pendidikan->nilai_akhir }}</td>
                <td>{{ $pendidikan->tanggal_lulus }}</td>
                <td>{{ $pendidikan->jenis_sekolah }}</td>
                <td>{{ $pendidikan->jurusan }}</td>
                <td>{{ $pendidikan->lokasi_sekolah }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada riwayat pendidikan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
<a href="{{ route('pilih-kategori') }}" style="bg-blue-500 text-white px-3 py-2 rounded"> Ajukan Perubahan Data </a> 
