@extends('layouts.app')

@section('content')
<div class="space-y-5">

    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Beranda</h1>
        <p class="mt-1 text-sm text-slate-600">
            Selamat datang di Sikampus. Gunakan menu untuk mengelola data mahasiswa.
        </p>
    </div>

    <div class="grid gap-5 lg:grid-cols-12">
        <div class="lg:col-span-8">
            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Data</div>
                        <h2 class="mt-1 text-lg font-semibold text-slate-900">Mahasiswa</h2>
                        <p class="mt-1 text-sm text-slate-600">
                            Lihat daftar mahasiswa, cari berdasarkan nama/NIM/jurusan, dan kelola data.
                        </p>
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap gap-2">
                    <a href="{{ route('mahasiswa.index') }}"
                       class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
                        Lihat Data Mahasiswa
                    </a>

                    <a href="{{ route('mahasiswa.create') }}"
                       class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                        Tambah Mahasiswa
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
