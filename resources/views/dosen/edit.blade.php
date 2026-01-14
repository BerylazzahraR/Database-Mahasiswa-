@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Edit Dosen</h1>
                <p class="mt-1 text-sm text-slate-600">Perbarui data dosen.</p>
            </div>
<!-- INI MULAI PAKAI COMPONENTS -->
            <x-button as="a" href="{{ route('dosen.index') }}" variant="secondary" size="sm">
                Kembali
            </x-button>
        </div>

        <form method="POST" action="{{ route('dosen.update', $dosen) }}" class="mt-6">
            @csrf
            @method('PUT')
            @include('dosen._form', ['dosen' => $dosen])
        </form>
    </div>
</div>
@endsection
