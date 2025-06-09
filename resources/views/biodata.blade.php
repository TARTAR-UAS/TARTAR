@extends('layout')

@section('content')
<div class="container mt-4">
    <a href="{{ route('index') }}" class="btn btn-secondary mb-3">Kembali ke Beranda</a>
    <h2>Biodata Mahasiswa</h2>
    <table class="table table-bordered">
        <tr>
            <th>NPM</th>
            <td>{{ $mahasiswa->npm }}</td>
        </tr>
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
        <tr>
            <th>Asal Sekolah</th>
            <td>{{ $mahasiswa->histori_pendidikan->nama_sekolah }}</td>
        </tr>
        <tr>
            <th>Nomor Ijazah</th>
            <td>{{ $mahasiswa->histori_pendidikan->nomor_ijazah }}</td>
        </tr>
        <tr>
            <th>Tanggal Ijazah</th>
            <td>{{ $mahasiswa->histori_pendidikan->tanggal_lulus }}</td>
        </tr>
    </table>
</div>
@endsection
