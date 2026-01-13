<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sikampus' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800 flex flex-col">
    {{-- HEADER --}}
    <header class="bg-[#0B4C79] text-white">
        <div class="mx-auto max-w-6xl px-4">
            <div class="flex items-center justify-between py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 font-semibold tracking-tight">
                    <!-- <span class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-white/15 ring-1 ring-white/20">
                        <span class="text-white font-bold">S</span>
                    </span> -->
                    <span class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-white/15 ring-1 ring-white/20 overflow-hidden">
    <img
        src="{{ asset('images/logokampus.jpg') }}"
        alt="Logo Kampus"
        class="h-9 w-9 object-contain"
    >
</span>


                    <div class="leading-tight">

                        <div class="text-lg font-semibold">Si Kampus</div>
                    </div>
                </a>

                <div class="flex items-center gap-2">
                    <a href="{{ route('mahasiswa.index') }}"
                       class="rounded-lg px-3 py-2 text-sm font-medium hover:bg-white/10">
                        Mahasiswa
                    </a>

                    <a href="{{ route('mahasiswa.create') }}"
                       class="rounded-lg bg-white px-3 py-2 text-sm font-semibold text-[#0B4C79] hover:bg-slate-100">
                        Tambah
                    </a>
                </div>
            </div>

            {{-- MENU BAR --}}
            <nav class="flex gap-6 border-t border-white/15 py-3 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:underline underline-offset-8">Beranda</a>
                <a href="{{ route('mahasiswa.index') }}" class="hover:underline underline-offset-8">Data Mahasiswa</a>
            </nav>
        </div>
    </header>

    {{-- CONTENT --}}
    <main class="mx-auto max-w-6xl px-4 py-6 flex-1">
        @if(session('success'))
            <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800">
                <div class="font-semibold">Periksa kembali input Anda:</div>
                <ul class="mt-2 list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot ?? '' }}
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t bg-bluelight">
        <div class="mx-auto max-w-6xl px-4 py-6 text-sm text-slate-500 text-center">
            © {{ date('Y') }} Sikampus — Beryl
        </div>
    </footer>
</body>
</html>
