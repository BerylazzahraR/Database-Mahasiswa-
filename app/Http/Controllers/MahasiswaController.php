<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{


private function getFormOptions(): array
{
    return [
        'prodis' => Prodi::orderBy('nama')->get(),
        'dosens' => Dosen::orderBy('nama')->get(),
    ];
}
    public function index(Request $request)
{
    $q        = $request->get('q');
    $prodiId  = $request->get('prodi_id');
    $dosenId  = $request->get('dosen_id');
    $angkatan = $request->get('angkatan');

    $mahasiswas = Mahasiswa::with(['prodi', 'dosen'])
        ->when($q, function ($query) use ($q) {
            $query->where(function ($qq) use ($q) {
                $qq->where('nim', 'like', "%{$q}%")
                   ->orWhere('nama', 'like', "%{$q}%")
                   ->orWhere('email', 'like', "%{$q}%")
                   ->orWhereHas('prodi', fn ($p) => $p->where('nama', 'like', "%{$q}%")->orWhere('kode', 'like', "%{$q}%"))
                   ->orWhereHas('dosen', fn ($d) => $d->where('nama', 'like', "%{$q}%")->orWhere('nidn', 'like', "%{$q}%"));
            });
        })
        ->when($prodiId, fn ($query) => $query->where('prodi_id', $prodiId))
        ->when($dosenId, fn ($query) => $query->where('dosen_id', $dosenId))
        ->when($angkatan, fn ($query) => $query->where('angkatan', $angkatan))
        ->latest()
        ->paginate(10)
        ->withQueryString();

    // data dropdown filter
    $prodis = Prodi::orderBy('nama')->get();
    $dosens = Dosen::orderBy('nama')->get();

    // opsi angkatan (sesuaikan range)
    $angkatanOptions = range(date('Y'), date('Y') - 10);

    return view('mahasiswa.index', compact(
        'mahasiswas', 'q', 'prodiId', 'dosenId', 'angkatan',
        'prodis', 'dosens', 'angkatanOptions'
    ));
}


    public function create()
    {
       $prodis = Prodi::orderBy('nama')->get();
    $dosens = Dosen::orderBy('nama')->get();

    return view('mahasiswa.create', compact('prodis', 'dosens'));
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->validated());

    return redirect()
        ->route('mahasiswa.index')
        ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa)
    {  
         $mahasiswa->load(['prodi', 'dosen']);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
{
    $prodis = Prodi::orderBy('nama')->get();
    $dosens = Dosen::orderBy('nama')->get();

    return view('mahasiswa.edit', compact('mahasiswa', 'prodis', 'dosens'));
}


 public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
{
    $mahasiswa->update($request->validated());

    return redirect()
        ->route('mahasiswa.index')
        ->with('success', 'Mahasiswa berhasil diperbarui.');
}

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    
}
