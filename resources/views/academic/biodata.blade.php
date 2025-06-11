@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Biodata Mahasiswa</h2>
    @if($biodata)
    <table class="table table-bordered">
        <tr><th>Nama</th><td>{{ $biodata->nama }}</td></tr>
        <tr><th>NIM</th><td>{{ $biodata->nim }}</td></tr>
        <tr><th>Tempat Lahir</th><td>{{ $biodata->tempat_lahir }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $biodata->tanggal_lahir }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $biodata->jenis_kelamin }}</td></tr>
        <tr><th>Agama</th><td>{{ $biodata->agama }}</td></tr>
        <tr><th>No Telepon</th><td>{{ $biodata->no_telepon }}</td></tr>
        <tr><th>Alamat</th><td>{{ $biodata->alamat }}</td></tr>
        <tr><th>Email</th><td>{{ $biodata->email }}</td></tr>
    </table>
    @else
    <div class="alert alert-warning">Biodata belum tersedia.</div>
    @endif
</div>
@endsection