@extends('layouts.app')

@section('title', 'Detail Anggota')

@section('content')
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <h1>Detail Anggota</h1>

    <table style="max-width: 600px;">
        <tr>
            <th style="width: 30%;">ID</th>
            <td>{{ $member->id }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $member->nama }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($member->status) }}</td>
        </tr>
    </table>

    <div style="margin-top: 16px;">
        <a href="{{ route('members.edit', $member->id) }}" class="btn">Edit Anggota</a>
    </div>
@endsection