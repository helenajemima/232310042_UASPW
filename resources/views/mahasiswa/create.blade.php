@extends('layouts.app')

@section('content')
<h3>Tambah Mahasiswa</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
    </div>
    <div class="mb-3">
        <label>NPM</label>
        <input type="text" name="npm" class="form-control" value="{{ old('npm') }}">
    </div>
    <div class="mb-3">
        <label>Fakultas</label>
        <select name="fakultas" id="fakultas" class="form-select" required>
            <option value="">-- Pilih Fakultas --</option>
            <option value="Fakultas Bisnis">Fakultas Bisnis</option>
            <option value="Fakultas Informatika & Pariwisata">Fakultas Informatika & Pariwisata</option>
            <option value="Vokasi">Vokasi</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-select" required>
            <option value="">-- Pilih Jurusan --</option>
        </select>
    </div>

    <script>
        const jurusanMap = {
            "Fakultas Bisnis": [
                "Akuntansi", "Manajemen", "Biokewirausahaan"
            ],
            "Fakultas Informatika & Pariwisata": [
                "Sistem Informasi", "Teknologi Informatika", "Pariwisata"
            ],
            "Vokasi": [
                "Akuntansi Bisnis Digital", "Bisnis Digital", "Perbankan & Keuangan Digital"
            ]
        };

        const fakultasSelect = document.getElementById('fakultas');
        const jurusanSelect = document.getElementById('jurusan');

        function updateJurusanOptions() {
            const selectedFakultas = fakultasSelect.value;
            jurusanSelect.innerHTML = '<option value="">-- Pilih Jurusan --</option>';

            if (jurusanMap[selectedFakultas]) {
                jurusanMap[selectedFakultas].forEach(function(jur) {
                    let option = document.createElement('option');
                    option.value = jur;
                    option.text = jur;
                    jurusanSelect.appendChild(option);
                });
            }
        }

        fakultasSelect.addEventListener('change', updateJurusanOptions);
    </script>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
