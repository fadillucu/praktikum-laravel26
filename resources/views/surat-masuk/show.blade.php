@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')
    <h1>Detail surat masuk</h1>
    @if($surat)
    <p>
        <strong>ID :</strong>
        {{ $surat['id'] }}
    </p>

    <p>
        <strong>Tanggal :</strong>
        {{ $surat['tanggal'] }}
    </p>

    <p>
        <strong>Pengirim :</strong>
        {{ $surat['pengirim'] }}
    </p>
        
    @else
        <p>surat tidak ditemukan</p>
    @endif
    <a href="{{ route('surat-masuk.index') }}">Kembali</a>
@endsection