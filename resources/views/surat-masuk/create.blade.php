@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('content')
    <a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-slate-800 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" /></svg> Kembali ke daftar
    </a>

    <h1 class="text-2xl font-bold tracking-tight text-slate-900 mb-1">Tambah Surat Masuk</h1>
    <p class="text-sm text-slate-500 mb-6">Isi data surat masuk dengan lengkap.</p>

    <form action="{{ route('surat-masuk.store') }}" method="POST"
          class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 max-w-2xl">
        @csrf
        <div class="space-y-5">
            <div>
                <label for="tanggal" class="block text-sm font-medium text-slate-700 mb-1.5">Tanggal</label>
                <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}"
                       class="w-full border rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('tanggal') border-red-400 @else border-slate-300 @enderror">
                @error('tanggal') <p class="text-red-600 text-sm mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="pengirim" class="block text-sm font-medium text-slate-700 mb-1.5">Pengirim</label>
                <input id="pengirim" type="text" name="pengirim" value="{{ old('pengirim') }}" placeholder="Nama pengirim surat"
                       class="w-full border rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('pengirim') border-red-400 @else border-slate-300 @enderror">
                @error('pengirim') <p class="text-red-600 text-sm mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="4" placeholder="Tulis keterangan surat (opsional)"
                          class="w-full border rounded-xl px-3.5 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('keterangan') border-red-400 @else border-slate-300 @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan') <p class="text-red-600 text-sm mt-1.5">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center gap-3 mt-8 pt-5 border-t border-slate-100">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm">Simpan</button>
            <a href="{{ route('surat-masuk.index') }}" class="px-5 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100">Batal</a>
        </div>
    </form>
@endsection
