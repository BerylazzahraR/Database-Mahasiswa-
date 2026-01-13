@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-5">
    <div class="flex flex-col justify-between gap-3 md:flex-row md:items-end">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Data Dosen</h1>
            <p class="mt-1 text-sm text-slate-600">Kelola data dosen pembimbing akademik.</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
           <div class="flex flex-wrap items-center gap-2">
    <form method="GET" class="flex flex-wrap gap-2">
        <input name="q" value="{{ $q }}"
               class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30 md:w-64"
               placeholder="Cari nama / NIDN / email">

        <select name="prodi_id"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30 md:w-64">
            <option value="">Semua Prodi</option>
            @foreach($prodis as $p)
                <option value="{{ $p->id }}" @selected((string)$prodiId === (string)$p->id)>
                    {{ $p->jenjang }} {{ $p->nama }} ({{ $p->kode }})
                </option>
            @endforeach
        </select>

        <button class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
            Filter
        </button>

        <a href="{{ route('dosen.index') }}"
           class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
            Reset
        </a>
    </form>

    <a href="{{ route('dosen.create') }}"
       class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
        Tambah
    </a>
</div>


            
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-slate-50">
                <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                    <th class="px-5 py-3">NIDN</th>
                    <th class="px-5 py-3">Nama</th>
                    <th class="px-5 py-3">Prodi</th>
                    <th class="px-5 py-3 text-right">Aksi</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                @forelse($dosens as $d)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $d->nidn }}</td>
                        <td class="px-5 py-4">
                            <div class="text-sm font-semibold text-slate-900">{{ $d->nama }}</div>
                            <div class="text-xs text-slate-500">{{ $d->email ?? '-' }}</div>
                        </td>
                        <td class="px-5 py-4 text-sm text-slate-700">
                            {{ $d->prodi->nama ?? '-' }}
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('dosen.show', $d) }}"
                                   class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                    Detail
                                </a>
                                <a href="{{ route('dosen.edit', $d) }}"
                                   class="rounded-lg bg-[#0B4C79] px-3 py-2 text-xs font-semibold text-white hover:bg-[#083b5d]">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('dosen.destroy', $d) }}"
                                      onsubmit="return confirm('Hapus dosen ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-lg bg-rose-600 px-3 py-2 text-xs font-semibold text-white hover:bg-rose-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-12 text-center text-sm text-slate-500">
                            Tidak ada data.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 bg-white px-5 py-4">
            {{ $dosens->links() }}
        </div>
    </div>
</div>
@endsection
