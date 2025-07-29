<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create() {
        return view('mahasiswa.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswas',
            'fakultas' => 'required',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa) {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa) {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'fakultas' => 'required',
            'jurusan' => 'required',
        ]);
        
        $mahasiswa->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
        ]);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Mahasiswa $mahasiswa) {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }
}
