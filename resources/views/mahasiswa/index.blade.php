@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-5">
    <div class="flex flex-col justify-between gap-3 md:flex-row md:items-end">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Data Mahasiswa</h1>
    
        </div>

        <form method="GET" class="flex w-full gap-2 md:w-auto">
            <input name="q" value="{{ $q }}"
                   class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 placeholder:text-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30 md:w-80"
                   placeholder="Cari nama / NIM / jurusan">
            <button class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
                Cari
            </button>
        </form>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                        <th class="px-5 py-3">NIM</th>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">Jurusan</th>
                        <th class="px-5 py-3">Angkatan</th>
                        <th class="px-5 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($mahasiswas as $m)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 text-sm font-medium text-slate-800">
                                {{ $m->nim }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="text-sm font-semibold text-slate-900">
                                    {{ $m->nama }}
                                </div>
                                <div class="text-xs text-slate-500">
                                    {{ $m->email }}
                                </div>
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-700">
                                {{ $m->jurusan }}
                            </td>

                            <td class="px-5 py-4 text-sm text-slate-700">
                                {{ $m->angkatan }}
                            </td>

                            <td class="px-5 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('mahasiswa.show', $m) }}"
                                       class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                        Detail
                                    </a>

                                    <a href="{{ route('mahasiswa.edit', $m) }}"
                                       class="rounded-lg bg-[#0B4C79] px-3 py-2 text-xs font-semibold text-white hover:bg-[#083b5d]">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('mahasiswa.destroy', $m) }}"
                                          onsubmit="return confirm('Hapus mahasiswa ini?');">
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
                            <td colspan="5" class="px-5 py-12 text-center text-sm text-slate-500">
                                Tidak ada data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 bg-white px-5 py-4">
            {{ $mahasiswas->links() }}
        </div>
    </div>
</div>
@endsection
