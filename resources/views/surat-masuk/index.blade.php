@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Surat Masuk</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola dan cari semua surat masuk.</p>
        </div>
        <a href="{{ route('surat-masuk.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-xl text-sm font-medium shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg> Tambah Surat Masuk
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm">
        <div class="p-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="relative w-full sm:w-80">
                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" /></svg></span>
                <input id="search" type="text" placeholder="Cari Pengirim atau keterangan..."
                       class="w-full border border-slate-300 rounded-xl pl-10 pr-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <span class="text-sm text-slate-500">Total: <strong class="text-slate-800">{{ $suratmasuk->count() }}</strong> surat</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-5 py-3 font-semibold">No</th>
                        <th class="px-5 py-3 font-semibold">Tanggal</th>
                        <th class="px-5 py-3 font-semibold">Pengirim</th>
                        <th class="px-5 py-3 font-semibold">Keterangan</th>
                        <th class="px-5 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($suratmasuk as $surat)
                        <tr data-row class="hover:bg-slate-50">
                            <td class="px-5 py-3 text-slate-500">{{ $loop->iteration }}</td>
                            <td class="px-5 py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d/m/Y') }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 shrink-0 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold">
                                        {{ mb_strtoupper(mb_substr($surat->pengirim, 0, 1)) }}
                                    </span>
                                    <span class="font-medium text-slate-900">{{ $surat->pengirim }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-slate-600">{{ $surat->keterangan ?? '-' }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('surat-masuk.show', $surat->id) }}" title="Detail"
                                       class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-sky-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg></a>
                                    <a href="{{ route('surat-masuk.edit', $surat->id) }}" title="Edit"
                                       class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-amber-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg></a>
                                    <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus"
                                                class="p-2 rounded-lg text-slate-500 hover:bg-red-50 hover:text-red-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center">
                                <div class="mx-auto w-12 h-12 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" /></svg></div>
                                <p class="font-medium text-slate-700">Belum ada surat masuk</p>
                                <p class="text-sm text-slate-500 mt-1">Klik tombol "Tambah Surat Masuk" untuk memulai.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function () {
            const q = this.value.toLowerCase();
            document.querySelectorAll('tbody tr[data-row]').forEach(function (tr) {
                tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    </script>
@endsection
