@php
  $isEdit = isset($mahasiswa);

  $prodiOptions = $prodis->mapWithKeys(fn($p) => [
      $p->id => $p->jenjang.' - '.$p->nama.' ('.$p->kode.')'
  ])->toArray();

  $dosenOptions = $dosens->mapWithKeys(fn($d) => [
      $d->id => $d->nama.' ('.$d->nidn.')'
  ])->toArray();

  $tanggalLahir = old(
      'tanggal_lahir',
      isset($mahasiswa?->tanggal_lahir)
          ? optional($mahasiswa->tanggal_lahir)->format('Y-m-d')
          : ''
  );
@endphp
<!-- INI MULAI PAKAI COMPONENTS -->
<div class="grid gap-4 md:grid-cols-2">
    <x-input
        label="NIM"
        name="nim"
        :value="old('nim', $mahasiswa->nim ?? '')"
        placeholder="Contoh: 2023123456"
        required
    />

    <x-input
        label="Nama"
        name="nama"
        :value="old('nama', $mahasiswa->nama ?? '')"
        placeholder="Nama lengkap"
        required
    />

    <x-input
        label="Email"
        name="email"
        type="email"
        :value="old('email', $mahasiswa->email ?? '')"
        placeholder="nama@student.pnm.ac.id"
        hint="Gunakan domain kampus (contoh: @student.pnm.ac.id)"
        required
    />

    <x-select
        label="Prodi"
        name="prodi_id"
        :options="$prodiOptions"
        placeholder="-- Pilih Prodi --"
        :selected="old('prodi_id', $mahasiswa->prodi_id ?? '')"
        required
    />

    <x-select
        label="Dosen PA"
        name="dosen_id"
        :options="$dosenOptions"
        placeholder="-- Pilih Dosen PA --"
        :selected="old('dosen_id', $mahasiswa->dosen_id ?? '')"
        required
    />

    <x-input
        label="Angkatan"
        name="angkatan"
        type="number"
        :value="old('angkatan', $mahasiswa->angkatan ?? date('Y'))"
        min="2000"
        max="2100"
        required
    />

    <x-input
        label="Tanggal Lahir"
        name="tanggal_lahir"
        type="date"
        :value="$tanggalLahir"
    />

    <div class="md:col-span-2">
        <label class="text-sm font-semibold text-slate-700">Alamat</label>
        <textarea name="alamat" rows="3"
                  class="mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm
                         placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30"
                  placeholder="Alamat lengkap (opsional)">{{ old('alamat', $mahasiswa->alamat ?? '') }}</textarea>
        @error('alamat')
            <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-6 flex items-center justify-end gap-2">
    <!-- <x-button as="a" href="{{ route('mahasiswa.index') }}" variant="secondary">
        Batal
    </x-button> -->

    <x-button variant="primary" type="submit">
        {{ $isEdit ? 'Simpan Perubahan' : 'Tambah Mahasiswa' }}
    </x-button>
</div>
