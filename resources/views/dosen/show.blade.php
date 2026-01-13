@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <div class="flex items-start justify-between gap-3">
            <div>
                <h1 class="text-xl font-semibold text-slate-900">Detail Dosen</h1>
                <p class="mt-1 text-sm text-slate-600">Informasi dosen pembimbing akademik.</p>
            </div>
            <a href="{{ route('dosen.edit', $dosen) }}"
               class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
                Edit
            </a>
        </div>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">NIDN</div>
                <div class="mt-1 text-sm font-semibold text-slate-900">{{ $dosen->nidn }}</div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nama</div>
                <div class="mt-1 text-sm font-semibold text-slate-900">{{ $dosen->nama }}</div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Email</div>
                <div class="mt-1 text-sm text-slate-900">{{ $dosen->email ?? '-' }}</div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Prodi</div>
                <div class="mt-1 text-sm text-slate-900">{{ $dosen->prodi->nama ?? '-' }}</div>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('dosen.index') }}"
               class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
