@props([
    'variant' => 'secondary', // primary|secondary|danger|ghost
    'size' => 'md',           // sm|md
    'as' => 'button',         // button|a
])

@php
    $base = "inline-flex items-center justify-center gap-2 rounded-lg font-semibold shadow-sm
             focus:outline-none focus:ring-2 focus:ring-[#0B4C79]/25 disabled:opacity-60 disabled:cursor-not-allowed";

    $sizes = [
        'sm' => "px-3 py-2 text-xs",
        'md' => "px-4 py-2 text-sm",
    ];

    $variants = [
        'primary'   => "bg-[#0B4C79] text-white hover:bg-[#083b5d]",
        'secondary' => "border border-slate-300 bg-white text-slate-700 hover:bg-slate-50",
        'danger'    => "bg-rose-600 text-white hover:bg-rose-700",
        'ghost'     => "text-slate-700 hover:bg-slate-100",
    ];

    $class = $base.' '.$sizes[$size].' '.$variants[$variant];
@endphp

@if($as === 'a')
    <a {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
