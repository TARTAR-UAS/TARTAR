@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Transkrip Nilai</h2>
    <p>Nama: {{ Auth::user()->name }}</p>
    <p>NIM: {{ Auth::user()->nim }}</p> {{-- pastikan kolom 'nim' ada di tabel users --}}
    
    <table class="table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TK13019</td>
                <td>Computation I</td>
                <td>4</td>
                <td>A</td>
            </tr>
            <tr>
                <td>TK13021</td>
                <td>Database Systems</td>
                <td>4</td>
                <td>B-</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
