
@extends('layouts.app')

@section('title', 'Surat Keluar')

@section('content')
    <h1>Daftar Surat Keluar</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Penerima</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($suratkeluar as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat['id'] }}</td>
                    <td>{{ $surat['tanggal'] }}</td>
                    <td>{{ $surat['penerima'] }}</td>
                    <td>
                        <a href="{{ route('surat-keluar.show', $surat['id']) }}">
                            Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
