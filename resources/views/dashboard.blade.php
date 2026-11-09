@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @php
        $totalMasuk = \App\Models\IncomingLetter::count();
        $totalKeluar = \App\Models\OutgoingLetter::count();
        $masukTerbaru = \App\Models\IncomingLetter::latest('id')->take(5)->get();
        $keluarTerbaru = \App\Models\OutgoingLetter::latest('id')->take(5)->get();
    @endphp

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Dashboard</h1>
            <p class="text-sm text-slate-500 mt-1">Selamat datang di Sistem Informasi Surat.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('surat-masuk.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl text-sm font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg> Surat Masuk
            </a>
            <a href="{{ route('surat-keluar.create') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-sm font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg> Surat Keluar
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Total Surat</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalMasuk + $totalKeluar }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" /></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Surat Masuk</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalMasuk }}</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" /></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Surat Keluar</p>
                <p class="text-3xl font-bold text-slate-900">{{ $totalKeluar }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <h2 class="font-semibold text-slate-900">Surat Masuk Terbaru</h2>
                <a href="{{ route('surat-masuk.index') }}" class="text-sm font-medium text-indigo-600 hover:underline">Lihat semua</a>
            </div>
            <ul class="divide-y divide-slate-100">
                @forelse ($masukTerbaru as $surat)
                    <li>
                        <a href="{{ route('surat-masuk.show', $surat->id) }}" class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50">
                            <span class="w-10 h-10 shrink-0 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold">
                                {{ mb_strtoupper(mb_substr($surat->pengirim, 0, 1)) }}
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block text-sm font-medium text-slate-900 truncate">{{ $surat->pengirim }}</span>
                                <span class="block text-xs text-slate-500 truncate">{{ \Illuminate\Support\Str::limit($surat->keterangan ?? '-', 40) }}</span>
                            </span>
                            <span class="text-xs text-slate-400 shrink-0">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d/m/Y') }}</span>
                        </a>
                    </li>
                @empty
                    <li class="px-5 py-8 text-center text-sm text-slate-500">Belum ada data</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <h2 class="font-semibold text-slate-900">Surat Keluar Terbaru</h2>
                <a href="{{ route('surat-keluar.index') }}" class="text-sm font-medium text-emerald-600 hover:underline">Lihat semua</a>
            </div>
            <ul class="divide-y divide-slate-100">
                @forelse ($keluarTerbaru as $surat)
                    <li>
                        <a href="{{ route('surat-keluar.show', $surat->id) }}" class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50">
                            <span class="w-10 h-10 shrink-0 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-semibold">
                                {{ mb_strtoupper(mb_substr($surat->penerima, 0, 1)) }}
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="block text-sm font-medium text-slate-900 truncate">{{ $surat->penerima }}</span>
                                <span class="block text-xs text-slate-500 truncate">{{ \Illuminate\Support\Str::limit($surat->keterangan ?? '-', 40) }}</span>
                            </span>
                            <span class="text-xs text-slate-400 shrink-0">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d/m/Y') }}</span>
                        </a>
                    </li>
                @empty
                    <li class="px-5 py-8 text-center text-sm text-slate-500">Belum ada data</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
