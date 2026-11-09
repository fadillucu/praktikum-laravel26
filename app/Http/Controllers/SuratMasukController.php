<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;

use Illuminate\Http\Request;
use OuterIterator;

class SuratMasukController extends Controller
{
    // Menampilkan daftar surat masuk
    public function index()
    {
        $suratmasuk = IncomingLetter::orderBy('id', 'asc')->get();

        return view('surat-masuk.index', compact('suratmasuk'));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        return view('surat-masuk.create');
    }

    // Menyimpan surat masuk
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        IncomingLetter::create($validate);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan');
    }

    // Menampilkan detail surat masuk
    public function show($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        return view('surat-masuk.edit', compact('surat'));
    }

    // Memperbarui surat masuk
    public function update(Request $request, $id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $validate = $request->validate([
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $surat->update($validate);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui');
    }

    // Menghapus surat masuk
    public function destroy($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus');
    }

}