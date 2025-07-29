@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <div class="d-flex align-items-center">
        <img src="{{ asset('images/LOGO_IBIK.png') }}" alt="Icon" width="50" height="50" class="me-2">
        <h3 class="mb-0">Daftar Mahasiswa</h3>
    </div>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
</div>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $mhs)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->npm }}</td>
            <td>{{ $mhs->fakultas }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
