@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'hint' => null,
])

@php
    $id = $attributes->get('id') ?? $name;
@endphp

<div>
    @if($label)
        <label for="{{ $id }}" class="text-sm font-semibold text-slate-700">{{ $label }}</label>
    @endif

    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        {{ $attributes->merge([
            'class' => 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800
                        placeholder:text-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30'
        ]) }}
    >

    @if($hint)
        <p class="mt-1 text-xs text-slate-500">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
    @enderror
</div>
