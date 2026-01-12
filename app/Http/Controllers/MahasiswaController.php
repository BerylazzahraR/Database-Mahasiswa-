<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q')->toString();

        $mahasiswas = Mahasiswa::query()
            ->when($q, fn ($query) =>
                $query->where('nama', 'like', "%{$q}%")
                      ->orWhere('nim', 'like', "%{$q}%")
                      ->orWhere('jurusan', 'like', "%{$q}%")
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('mahasiswa.index', compact('mahasiswas', 'q'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => ['required','string','max:20','unique:mahasiswas,nim'],
            'nama' => ['required','string','max:120'],
            'email' => ['required','email','unique:mahasiswas,email'],
            'jurusan' => ['required','string','max:120'],
            'angkatan' => ['required','integer','min:2000','max:2100'],
            'tanggal_lahir' => ['nullable','date'],
            'alamat' => ['nullable','string'],
        ]);

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $request->validate([
            'nim' => ['required','string','max:20','unique:mahasiswas,nim,' . $mahasiswa->id],
            'nama' => ['required','string','max:120'],
            'email' => ['required','email','unique:mahasiswas,email,' . $mahasiswa->id],
            'jurusan' => ['required','string','max:120'],
            'angkatan' => ['required','integer','min:2000','max:2100'],
            'tanggal_lahir' => ['nullable','date'],
            'alamat' => ['nullable','string'],
        ]);

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.show', $mahasiswa)->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
