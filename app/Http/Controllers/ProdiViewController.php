<?php

namespace App\Http\Controllers;

use App\Models\Prodi;

class ProdiViewController extends Controller
{
    public function index()
    {
        $prodis = Prodi::query()
            ->withCount(['mahasiswas', 'dosens'])
            ->orderBy('nama')
            ->get();

        return view('prodi.index', compact('prodis'));
    }

    public function show(Prodi $prodi)
    {
        $prodi->load([
            'dosens' => fn ($q) => $q->orderBy('nama'),
        ])->loadCount(['mahasiswas', 'dosens']);

        return view('prodi.show', compact('prodi'));
    }
}
