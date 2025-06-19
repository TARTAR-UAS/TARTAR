@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Kuliah</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Mata Kuliah</th>
                <th>Ruangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Senin</td>
                <td>08:00 - 10:00</td>
                <td>Computation II</td>
                <td>A101</td>
            </tr>
            <tr>
                <td>Rabu</td>
                <td>10:00 - 12:00</td>
                <td>Numerical Method</td>
                <td>B202</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
