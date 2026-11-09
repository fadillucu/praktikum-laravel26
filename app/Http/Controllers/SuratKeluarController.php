<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index()
    {
        $suratkeluar = OutgoingLetter::orderBy('id', 'asc')->get();

        return view('surat-keluar.index', compact('suratkeluar'));
    }

    // Menampilkan form tambah surat keluar
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Menyimpan surat keluar
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'penerima' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        OutgoingLetter::create($validate);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan');
    }

    // Menampilkan detail surat keluar
    public function show($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // Menampilkan form edit surat keluar
    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.edit', compact('surat'));
    }

    // Memperbarui surat keluar
    public function update(Request $request, $id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $validate = $request->validate([
            'tanggal' => 'required|date',
            'penerima' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $surat->update($validate);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui');
    }

    // Menghapus surat keluar
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $surat->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus');
    }
}
