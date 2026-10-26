<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use OuterIterator;

class SuratMasukController extends Controller
{
    public function index(){
        $suratmasuk = IncomingLetter::all();

        return view('surat-masuk.index', compact('suratmasuk'));
    }
    public function show($id){
        //return 'halaman surat dari controll id: '. $id;
        $surat = [
        1 => [
            'id'        => 1,
            'tanggal'   => '03-10-1111',
            'pengirim'  => 'LPPM'
        ],
        2 => [
            'id'        => 2,
            'tanggal'   => '03-10-1121',
            'pengirim'  => 'wadadM'
        ],
        3 => [
            'id'        => 3,
            'tanggal'   => '03-310-1111',
            'pengirim'  => 'LsaPM',
        ]
    ];
        $surat = $surat [$id] ?? null;
        return view('surat-masuk.show',compact('surat'));
    }
    
    public function suratKeluar()
    {
        $suratkeluar = OutgoingLetter::all();

        return view('surat-keluar.index', compact('suratkeluar'));
}
public function Detail($id)
{
    $dataSuratKeluar = [
        1 => [
            'id' => 1,
            'tanggal' => '10-10-2026',
            'penerima' => 'Fakultas Teknik'
        ],
        2 => [
            'id' => 2,
            'tanggal' => '12-10-2026',
            'penerima' => 'Bagian Akademik'
        ],
        3 => [
            'id' => 3,
            'tanggal' => '15-10-2026',
            'penerima' => 'Universitas'
        ],
    ];

    $surat = $dataSuratKeluar[$id] ?? null;

    return view('surat-keluar.show', compact('surat'));
}
}
