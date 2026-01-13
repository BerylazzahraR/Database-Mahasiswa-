@extends('layouts.app')

@section('content')
<div class="grid gap-5 lg:grid-cols-12">
    <div class="lg:col-span-8">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
            <div class="flex flex-col justify-between gap-4 md:flex-row md:items-start">
                <div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">NIM</div>
                    <div class="mt-1 text-2xl font-semibold text-slate-900">{{ $mahasiswa->nim }}</div>
                    <div class="mt-2 text-sm text-slate-600">{{ $mahasiswa->email }}</div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}"
                       class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('mahasiswa.destroy', $mahasiswa) }}"
                          onsubmit="return confirm('Hapus mahasiswa ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-700">
                            Hapus
                        </button>
                    </form>
                    <a href="{{ route('mahasiswa.kartu.pdf', $mahasiswa) }}"
   class="inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold
          text-slate-700 shadow-sm hover:bg-slate-50">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="h-4 w-4 text-[#0B4C79]">
        <path d="M6 9V2h12v7"/>
        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
        <path d="M6 14h12v8H6z"/>
    </svg>
    Kartu (PDF)
</a>

                </div>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Nama</div>
                    <div class="mt-1 font-semibold text-slate-900">{{ $mahasiswa->nama }}</div>
                </div>

  
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                     <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Dosen PA</div>
                        <div class="mt-1 text-base font-semibold text-slate-900">
                            {{ $mahasiswa->dosen?->nama ?? '-' }}
                         </div>
                     @if($mahasiswa->dosen)
                       <div class="mt-1 text-sm text-slate-600">
                        NIDN: {{ $mahasiswa->dosen->nidn }}
                    </div>
                                    @endif
                </div>

                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                     <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Prodi</div>
                        <div class="mt-1 text-base font-semibold text-slate-900">
                            {{ $mahasiswa->prodi?->nama ?? '-' }}
                         </div>
                     @if($mahasiswa->prodi)
                       <div class="mt-1 text-sm text-slate-600">
                        {{ $mahasiswa->prodi->kode }}
                    </div>
                                    @endif
                </div>

                

                <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Angkatan</div>
                    <div class="mt-1 font-semibold text-slate-900">{{ $mahasiswa->angkatan }}</div>
                </div>

                <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Tanggal Lahir</div>
                    <div class="mt-1 font-semibold text-slate-900">
                        {{ $mahasiswa->tanggal_lahir?->format('d M Y') ?? '-' }}
                    </div>
                </div>

                <div class="md:col-span-2 rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <div class="text-xs font-semibold uppercase tracking-wider text-slate-500">Alamat</div>
                    <div class="mt-1 text-slate-800">{{ $mahasiswa->alamat ?? '-' }}</div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('mahasiswa.index') }}"
                   class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="lg:col-span-4">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow">
            <h2 class="text-base font-semibold text-slate-900">Ringkasan</h2>

            <dl class="mt-4 space-y-3 text-sm">
                <div class="flex items-center justify-between">
                    <dt class="text-slate-500">Dibuat</dt>
                    <dd class="font-semibold text-slate-900">{{ $mahasiswa->created_at->format('d M Y') }}</dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-slate-500">Diubah</dt>
                    <dd class="font-semibold text-slate-900">{{ $mahasiswa->updated_at->format('d M Y') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
