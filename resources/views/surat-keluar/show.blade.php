@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

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
        <strong>Penerima :</strong>
        {{ $surat['penerima'] }}
    </p>
        
    @else
        <p>surat tidak ditemukan</p>
    @endif
    <a href="{{ route('surat-keluar.index') }}">Kembali</a>
@endsection