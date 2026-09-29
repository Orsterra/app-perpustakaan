@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <h1>Detail Buku</h1>

    <table style="max-width: 600px;">
        <tr>
            <th style="width: 30%;">ID</th>
            <td>{{ $book['id'] }}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $book['judul'] }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $book['penulis'] }}</td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>{{ $book['penerbit'] }}</td>
        </tr>
        <tr>
            <th>Tahun Terbit</th>
            <td>{{ $book['tahun_terbit'] }}</td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td>{{ $book['isbn'] ?? '-' }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book['stok'] }}</td>
        </tr>
        <tr>
            <th>ID Kategori</th>
            <td>{{ $book['category_id'] }}</td>
        </tr>
    </table>

    <div style="margin-top: 16px;">
        <a href="{{ route('books.edit', $book['id']) }}" class="btn">Edit Buku</a>
    </div>
@endsection