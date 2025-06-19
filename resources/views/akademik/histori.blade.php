@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Histori Nilai Mahasiswa</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>id </th>
                <th>Nama</th>
                <th>NIM</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $nilai)
            <tr>
                <td>{{ $item->nama_mata_kuliah }}</td>
                <td>{{ $item->sks }}</td>
                <td>{{ $item->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
