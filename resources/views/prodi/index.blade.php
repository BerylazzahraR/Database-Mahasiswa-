@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-5">
    <div>
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Data Prodi</h1>
        <p class="mt-1 text-sm text-slate-600">Ringkasan jumlah mahasiswa dan dosen per prodi.</p>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                        <th class="px-5 py-3">Kode</th>
                        <th class="px-5 py-3">Prodi</th>
                        <th class="px-5 py-3">Jenjang</th>
                        <th class="px-5 py-3">Mahasiswa</th>
                        <th class="px-5 py-3">Dosen</th>
                        <th class="px-5 py-3 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($prodis as $p)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $p->kode }}</td>
                            <td class="px-5 py-4">
                                <div class="text-sm font-semibold text-slate-900">{{ $p->nama }}</div>
                                <div class="text-xs text-slate-500">Total: {{ $p->mahasiswas_count }} mahasiswa</div>
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-700">{{ $p->jenjang }}</td>
                            <td class="px-5 py-4 text-sm text-slate-700">{{ $p->mahasiswas_count }}</td>
                            <td class="px-5 py-4 text-sm text-slate-700">{{ $p->dosens_count }}</td>
                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('prodi.show', $p) }}"
                                   class="rounded-lg bg-[#0B4C79] px-3 py-2 text-xs font-semibold text-white hover:bg-[#083b5d]">
                                    Lihat Dosen
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center text-sm text-slate-500">
                                Tidak ada data prodi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
