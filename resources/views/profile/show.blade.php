@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <h1>Profil Pengguna</h1>

    @if (session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; font-size: 14px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 500px; margin-bottom: 24px;">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
    </div>

    <h2>Ganti Password</h2>
    <form action="{{ route('profile.password') }}" method="POST" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); max-width: 500px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 12px;">
            <label for="current_password" style="display: block; font-weight: bold; margin-bottom: 4px;">Password Lama</label>
            <input type="password" name="current_password" id="current_password" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
            @error('current_password')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="new_password" style="display: block; font-weight: bold; margin-bottom: 4px;">Password Baru</label>
            <input type="password" name="new_password" id="new_password" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
            @error('new_password')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="new_password_confirmation" style="display: block; font-weight: bold; margin-bottom: 4px;">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" class="btn" style="padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Simpan Password Baru</button>
    </form>
@endsection