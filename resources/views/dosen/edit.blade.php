@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <h1 class="text-xl font-semibold text-slate-900">Edit Dosen</h1>
        <p class="mt-1 text-sm text-slate-600">Perbarui data dosen.</p>

        <form method="POST" action="{{ route('dosen.update', $dosen) }}" class="mt-6">
            @csrf
            @method('PUT')
            @include('dosen._form', ['dosen' => $dosen])
        </form>
    </div>
</div>
@endsection
