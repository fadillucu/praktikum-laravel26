@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg> Kembali ke daftar
    </a>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm max-w-2xl overflow-hidden">
        <div class="bg-indigo-600 px-6 py-6 text-white flex items-center gap-4">
            <span class="w-14 h-14 rounded-full bg-white/20 flex items-center justify-center text-xl font-bold">
                {{ mb_strtoupper(mb_substr($surat->pengirim, 0, 1)) }}
            </span>
            <div>
                <p class="text-sm text-white/80">Detail Surat Masuk</p>
                <h1 class="text-xl font-bold">{{ $surat->pengirim }}</h1>
            </div>
        </div>

        <dl class="divide-y divide-slate-100 px-6">
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm text-slate-500">ID</dt>
                <dd class="col-span-2 text-sm font-medium text-slate-900">#{{ $surat->id }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm text-slate-500">Tanggal</dt>
                <dd class="col-span-2 text-sm font-medium text-slate-900">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d/m/Y') }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm text-slate-500">Pengirim</dt>
                <dd class="col-span-2 text-sm font-medium text-slate-900">{{ $surat->pengirim }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm text-slate-500">Keterangan</dt>
                <dd class="col-span-2 text-sm text-slate-900">{{ $surat->keterangan ?? '-' }}</dd>
            </div>
        </dl>

        <div class="flex items-center gap-3 px-6 py-5 bg-slate-50 border-t border-slate-100">
            <a href="{{ route('surat-masuk.edit', $surat->id) }}"
               class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-xl text-sm font-medium"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg> Edit</a>
            <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2 rounded-xl text-sm font-medium"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg> Hapus</button>
            </form>
        </div>
    </div>
@endsection
