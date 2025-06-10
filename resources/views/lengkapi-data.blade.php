@extends('layout-admin')

@section('content')
<div class="container mt-4">
    <h2>Lengkapi Data Mahasiswa</h2>
        <form action="{{ route('lengkapi-data-update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $mahasiswa->id }}">
        
        <div class="mb-3">
            <label>Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" value="{{ $mahasiswa->nama_depan }}">
        </div>
        <div class="mb-3">
            <label>Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" value="{{ $mahasiswa->nama_belakang }}">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
                <option value="Laki-laki" {{ $mahasiswa->jenis_kelamin=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $mahasiswa->jenis_kelamin=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Agama</label>
            <select name="agama" class="form-select">
                <option value="Islam" {{ $mahasiswa->agama=='Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Kristen" {{ $mahasiswa->agama=='Kristen' ? 'selected' : '' }}>Kristen</option>
                <option value="Katolik" {{ $mahasiswa->agama=='Katolik' ? 'selected' : '' }}>Katolik</option>
                <option value="Buddha" {{ $mahasiswa->agama=='Buddha' ? 'selected' : '' }}>Buddha</option>
                <option value="Hindu" {{ $mahasiswa->agama=='Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Konghucu" {{ $mahasiswa->agama=='Konghucu' ? 'selected' : '' }}>Konghucu</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $mahasiswa->tanggal_lahir }}">
        </div>
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="{{ $mahasiswa->tempat_lahir }}">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $mahasiswa->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label>No Telp</label>
            <input type="text" name="no_telp" class="form-control" value="{{ $mahasiswa->no_telp }}">
        <div class="mb-3">
            <label>Angkatan</label>
            <input type="text" name="angkatan" class="form-control" value="{{ $mahasiswa->angkatan }}">
        </div>
        <div class="mb-3">
            <label>Program Studi</label>
            <input type="text" name="program_studi" class="form-control" value="{{ $mahasiswa->program_studi }}">
        </div>
        <div class="mb-3">
            <label>Fakultas</label>
            <input type="text" name="fakultas" class="form-control" value="{{ $mahasiswa->fakultas }}">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status_perkuliahan" class="form-select">
                <option value="Aktif" {{ $mahasiswa->status_perkuliahan=='Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Cuti" {{ $mahasiswa->status_perkuliahan=='Cuti' ? 'selected' : '' }}>Cuti</option>
                <option value="Lulus" {{ $mahasiswa->status_perkuliahan=='Lulus' ? 'selected' : '' }}>Lulus</option>
                <option value="Dropout" {{ $mahasiswa->status_perkuliahan=='Dropout' ? 'selected' : '' }}>Dropout</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection


