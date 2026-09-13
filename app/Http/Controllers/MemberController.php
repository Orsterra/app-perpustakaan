<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id'            => 1,
            'nama'          => 'Ahmad Fauzi',
            'nim'           => '22041110001',
            'email'         => 'ahmad@example.com',
            'nomor_telepon' => '081234567890',
            'alamat'        => 'Jl. Ketintang Baru No. 12',
            'status'        => 'aktif',
        ],
        [
            'id'            => 2,
            'nama'          => 'Siti Nurhaliza',
            'nim'           => '22041110002',
            'email'         => 'siti@example.com',
            'nomor_telepon' => '089876543210',
            'alamat'        => 'Jl. Raya Darmo No. 45',
            'status'        => 'aktif',
        ],
    ];

    public function index()
    {
        $members = $this->members;
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);
        abort_if(! $member, 404);

        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return redirect()->route('members.index')
            ->with('success', "Anggota dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}