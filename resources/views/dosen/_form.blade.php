@php
    $isEdit = isset($dosen);

    $prodiOptions = $prodis->mapWithKeys(fn($p) => [
        $p->id => $p->jenjang.' '.$p->nama.' ('.$p->kode.')'
    ])->toArray();
@endphp
<!-- INI MULAI PAKAI COMPONENTS -->
<div class="grid gap-4 md:grid-cols-2">
    <x-input
        label="NIDN"
        name="nidn"
        :value="old('nidn', $dosen->nidn ?? '')"
        placeholder="contoh: 0123456789"
        required
    />

    <x-input
        label="Nama"
        name="nama"
        :value="old('nama', $dosen->nama ?? '')"
        placeholder="Nama dosen"
        required
    />

    <x-input
        label="Email "
        name="email"
        type="email"
        :value="old('email', $dosen->email ?? '')"
        placeholder="nama@pnm.ac.id"
    />

    <x-select
        label="Prodi "
        name="prodi_id"
        :options="$prodiOptions"
        placeholder="- Pilih Prodi -"
        :selected="old('prodi_id', $dosen->prodi_id ?? '')"
    />
</div>

<div class="mt-6 flex items-center justify-end gap-2">
    <!-- <x-button as="a" href="{{ route('dosen.index') }}" variant="secondary">
        Kembali
    </x-button> -->

    <x-button variant="primary" type="submit">
        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan' }}
    </x-button>
</div>
