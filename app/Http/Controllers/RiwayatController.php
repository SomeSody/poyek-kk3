<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiwayatController extends Controller
{
    public function index()
    {
        // server-side pagination Laravel
        $riwayats = Riwayat::latest()->paginate(10);
        return view('riwayats.index', compact('riwayats'));
    }

    public function create()
    {
        return view('riwayats.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'permohonan_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'petugas_warga_id' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            
        ]);

        

        Riwayat::create($data);

        return redirect()->route('riwayats.index')->with('success', 'Riwayat created.');
    }

    public function show(Riwayat $riwayat)
    {
        return view('riwayats.show', compact('riwayat'));
    }

    public function edit(Riwayat $riwayat)
    {
        return view('riwayats.edit', compact('riwayat'));
    }

    public function update(Request $request, Riwayat $riwayat)
    {
        $data = $request->validate([
            'permohonan_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'petugas_warga_id' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            
        ]);

        

        $riwayat->update($data);

        return redirect()->route('riwayats.index')->with('success', 'Riwayat updated.');
    }

    public function destroy(Riwayat $riwayat)
    {
        $riwayat->delete();
        return redirect()->route('riwayats.index')->with('success', 'Riwayat deleted.');
    }
}