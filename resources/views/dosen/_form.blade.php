@php $isEdit = isset($dosen); @endphp

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="text-sm font-semibold text-slate-700">NIDN</label>
        <input name="nidn" value="{{ old('nidn', $dosen->nidn ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm
                      focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="contoh: 0123456789">
    </div>

    <div>
        <label class="text-sm font-semibold text-slate-700">Nama</label>
        <input name="nama" value="{{ old('nama', $dosen->nama ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm
                      focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="Nama dosen">
    </div>

    <div>
        <label class="text-sm font-semibold text-slate-700">Email </label>
        <input name="email" value="{{ old('email', $dosen->email ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm
                      focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="nama@pnm.ac.id">
    </div>

    <div>
        <label class="text-sm font-semibold text-slate-700">Prodi</label>
        <select name="prodi_id"
                class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30">
            <option value="">- Pilih Prodi -</option>
            @foreach($prodis as $p)
                <option value="{{ $p->id }}"
                    @selected((string)old('prodi_id', $dosen->prodi_id ?? '') === (string)$p->id)>
                    {{ $p->jenjang }} {{ $p->nama }} ({{ $p->kode }})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mt-6 flex gap-2">
    <button class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan' }}
    </button>

    <a href="{{ route('dosen.index') }}"
       class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
        Kembali
    </a>
</div>
