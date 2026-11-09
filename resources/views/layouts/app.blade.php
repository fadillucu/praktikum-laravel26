<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Informasi Surat</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans">
<div class="min-h-screen">

    {{-- SIDEBAR (desktop) --}}
    <aside class="hidden lg:flex lg:flex-col lg:fixed lg:inset-y-0 lg:w-64 bg-white border-r border-slate-200">
        <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-200">
            <div class="w-9 h-9 rounded-xl bg-indigo-600 text-white flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
            </div>
            <div class="leading-tight">
                <p class="text-4x1 font-bold text-slate-900">Sistem Surat</p>
                <p class="text-xs text-slate-500">Informasi &amp; arsip</p>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1">
            <p class="px-3 pb-2 text-xs font-semibold uppercase tracking-wider text-slate-400">Menu</p>
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                Dashboard
            </a>
            <a href="{{ route('surat-masuk.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('surat-masuk.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" /></svg>
                Surat Masuk
            </a>
            <a href="{{ route('surat-keluar.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('surat-keluar.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" /></svg>
                Surat Keluar
            </a>
        </nav>

        <div class="p-4 border-t border-slate-200 text-xs text-slate-400">
            &copy; {{ date('Y') }} Sistem Informasi Surat
        </div>
    </aside>

    <div class="lg:pl-64 flex flex-col min-h-screen">

        {{-- TOPBAR (mobile) --}}
        <header class="lg:hidden bg-white border-b border-slate-200 sticky top-0 z-10">
            <div class="px-4 h-14 flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                </div>
                <p class="font-bold text-slate-900">Sistem Surat</p>
            </div>
            <nav class="px-4 pb-3 flex gap-2 overflow-x-auto">
                <a href="{{ route('dashboard') }}"
                   class="px-3 py-1.5 rounded-full text-sm font-medium whitespace-nowrap {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-600' }}">Dashboard</a>
                <a href="{{ route('surat-masuk.index') }}"
                   class="px-3 py-1.5 rounded-full text-sm font-medium whitespace-nowrap {{ request()->routeIs('surat-masuk.*') ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-600' }}">Surat Masuk</a>
                <a href="{{ route('surat-keluar.index') }}"
                   class="px-3 py-1.5 rounded-full text-sm font-medium whitespace-nowrap {{ request()->routeIs('surat-keluar.*') ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-600' }}">Surat Keluar</a>
            </nav>
        </header>

        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            @if (session('success'))
                <div class="mb-6 flex items-start justify-between gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
