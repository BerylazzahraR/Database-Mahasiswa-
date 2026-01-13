@extends('layouts.app')

@section('content')
<div class="max-w-3xl">
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
        <h1 class="text-xl font-semibold text-slate-900">Tambah Dosen</h1>
        <p class="mt-1 text-sm text-slate-600">Tambahkan data dosen pembimbing akademik.</p>

        <form method="POST" action="{{ route('dosen.store') }}" class="mt-6">
            @csrf
            @include('dosen._form')
        </form>
    </div>
</div>
@endsection
