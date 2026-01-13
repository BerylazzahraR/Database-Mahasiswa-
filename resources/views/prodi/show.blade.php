@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-5">
    <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">{{ $prodi->nama }}</h1>
            <p class="mt-1 text-sm text-slate-600">
                {{ $prodi->jenjang }} • Kode: {{ $prodi->kode }}
            </p>
        </div>

        <a href="{{ route('prodi.index') }}"
           class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
            Kembali
        </a>
    </div>

    {{-- Ringkasan --}}
    <div class="grid gap-3 md:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Mahasiswa</div>
            <div class="mt-2 text-2xl font-bold text-slate-900">{{ $prodi->mahasiswas_count }}</div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Dosen</div>
            <div class="mt-2 text-2xl font-bold text-slate-900">{{ $prodi->dosens_count }}</div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Detail</div>
            <div class="mt-2 text-sm text-slate-700">
                Menampilkan daftar dosen beserta NIDN dan email.
            </div>
        </div>
    </div>

    {{-- List Dosen --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow">
        <div class="px-5 py-4 border-b border-slate-200 bg-slate-50">
            <div class="flex items-center justify-between">
                <div class="text-sm font-semibold text-slate-900">Daftar Dosen</div>
                <div class="text-sm text-slate-600">Total: {{ $prodi->dosens_count }}</div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-white">
                    <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                        <th class="px-5 py-3">NIDN</th>
                        <th class="px-5 py-3">Nama</th>
                        <th class="px-5 py-3">Email</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($prodi->dosens as $d)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $d->nidn }}</td>
                            <td class="px-5 py-4 text-sm font-semibold text-slate-900">{{ $d->nama }}</td>
                            <td class="px-5 py-4 text-sm text-slate-700">{{ $d->email ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-5 py-10 text-center text-sm text-slate-500">
                                Belum ada dosen pada prodi ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
