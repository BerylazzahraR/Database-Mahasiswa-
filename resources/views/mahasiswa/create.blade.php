@extends('layouts.app')

@section('content')
<div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
    <div class="flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Tambah Mahasiswa</h1>
            <p class="mt-1 text-sm text-slate-600">Masukkan data mahasiswa baru.</p>
        </div>
    </div>

    <form class="mt-6" method="POST" action="{{ route('mahasiswa.store') }}">
        @csrf
        @include('mahasiswa._form')
    </form>
</div>
@endsection
