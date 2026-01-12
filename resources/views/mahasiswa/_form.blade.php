@php
  $isEdit = isset($mahasiswa);
@endphp

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="text-sm font-medium text-slate-700">NIM</label>
        <input name="nim" value="{{ old('nim', $mahasiswa->nim ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="Contoh: 2023123456" required>
    </div>

    <div>
        <label class="text-sm font-medium text-slate-700">Nama</label>
        <input name="nama" value="{{ old('nama', $mahasiswa->nama ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="Nama lengkap" required>
    </div>

    <div>
        <label class="text-sm font-medium text-slate-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $mahasiswa->email ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="nama@kampus.ac.id" required>
    </div>

    <div>
        <label class="text-sm font-medium text-slate-700">Jurusan</label>
        <input name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan ?? '') }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               placeholder="Teknologi Informasi / Informatika / dst" required>
    </div>

    <div>
        <label class="text-sm font-medium text-slate-700">Angkatan</label>
        <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan ?? date('Y')) }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
               min="2000" max="2100" required>
    </div>

    <div>
        <label class="text-sm font-medium text-slate-700">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir"
               value="{{ old('tanggal_lahir', optional($mahasiswa->tanggal_lahir ?? null)->format('Y-m-d')) }}"
               class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30">
    </div>

    <div class="md:col-span-2">
        <label class="text-sm font-medium text-slate-700">Alamat</label>
        <textarea name="alamat" rows="3"
                  class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
                  placeholder="Alamat lengkap (opsional)">{{ old('alamat', $mahasiswa->alamat ?? '') }}</textarea>
    </div>
</div>

<div class="mt-6 flex items-center justify-end gap-2">
    <a href="{{ route('mahasiswa.index') }}"
       class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50">
        Batal
    </a>

    <button class="rounded-lg bg-[#0B4C79] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#083b5d]">
        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Mahasiswa' }}
    </button>
</div>
