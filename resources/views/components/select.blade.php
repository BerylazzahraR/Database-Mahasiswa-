@props([
    'label' => null,
    'name' => null,
    'options' => [],   // array id => label
    'placeholder' => '- Pilih -',
    'selected' => null,
    'hint' => null,
])

@php
    $id = $attributes->get('id') ?? $name;
    $current = old($name, $selected);
@endphp

<div>
    @if($label)
        <label for="{{ $id }}" class="text-sm font-semibold text-slate-700">{{ $label }}</label>
    @endif

    <select
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'mt-1 w-full rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm text-slate-800
                        shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/30'
        ]) }}
    >
        @if($placeholder !== null)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $value => $text)
            <option value="{{ $value }}" @selected((string)$current === (string)$value)>
                {{ $text }}
            </option>
        @endforeach
    </select>

    @if($hint)
        <p class="mt-1 text-xs text-slate-500">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-xs font-medium text-rose-600">{{ $message }}</p>
    @enderror
</div>
