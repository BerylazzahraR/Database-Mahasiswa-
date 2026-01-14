@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <div class="flex items-start justify-between gap-4">
            <div>
                <!-- INI MULAI PAKAI COMPONENTS -->
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Tambah Dosen</h1>
                <p class="mt-1 text-sm text-slate-600">Tambahkan data dosen pembimbing akademik.</p>
            </div>

            <x-button as="a" href="{{ route('dosen.index') }}" variant="secondary" size="sm">
                Kembali
            </x-button>
        </div>

        <form method="POST" action="{{ route('dosen.store') }}" class="mt-6">
            @csrf
            @include('dosen._form')
        </form>
    </div>
</div>
@endsection
