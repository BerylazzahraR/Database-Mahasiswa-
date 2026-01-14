@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Edit Mahasiswa</h1>
                <p class="mt-1 text-sm text-slate-600">Perbarui data mahasiswa.</p>
            </div>
<!-- INI MULAI PAKAI COMPONENTS -->
            <x-button as="a" href="{{ route('mahasiswa.index') }}" variant="secondary" size="sm">
                Kembali
            </x-button>
        </div>

        <form class="mt-6" method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}">
            @csrf
            @method('PUT')
            @include('mahasiswa._form', ['mahasiswa' => $mahasiswa])
        </form>
    </div>
</div>
@endsection
