<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Prodi;


class DosenController extends Controller
{
    public function index(Request $request)
{
    $q       = $request->get('q');
    $prodiId = $request->get('prodi_id');

    $dosens = Dosen::with('prodi')
        ->when($q, function ($query) use ($q) {
            $query->where(function ($qq) use ($q) {
                $qq->where('nama', 'like', "%{$q}%")
                   ->orWhere('nidn', 'like', "%{$q}%")
                   ->orWhere('email', 'like', "%{$q}%");
            });
        })
        ->when($prodiId, fn ($query) => $query->where('prodi_id', $prodiId))
        ->orderBy('nama')
        ->paginate(10)
        ->withQueryString();

    $prodis = Prodi::orderBy('nama')->get();

    return view('dosen.index', compact('dosens', 'q', 'prodiId', 'prodis'));
}



    public function create()
{
    return view('dosen.create', $this->getFormOptions());
}


    public function store(StoreDosenRequest $request)
    {
        Dosen::create($request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
{
    $dosen->load('prodi');
    return view('dosen.show', compact('dosen'));
}

    public function edit(Dosen $dosen)
{
    return view('dosen.edit', array_merge(['dosen' => $dosen], $this->getFormOptions()));
}

    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Dosen berhasil dihapus.');
    }
    private function getFormOptions(): array
{
    return [
        'prodis' => Prodi::orderBy('nama')->get(),
    ];
}

}
