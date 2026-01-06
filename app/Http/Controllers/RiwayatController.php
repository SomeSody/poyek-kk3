<?php

namespace App\Http\Controllers;

use App\Models\RiwayatStatusSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiwayatController extends Controller
{
    public function index()
    {
        // server-side pagination Laravel
        $riwayats = RiwayatStatusSurat::latest()->paginate(9);
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

        

        RiwayatStatusSurat::create($data);

        return redirect()->route('riwayats.index')->with('success', 'Riwayat1 created.');
    }

    public function show(RiwayatStatusSurat $riwayat)
    {
        return view('riwayats.show', compact('riwayat'));
    }

    public function edit(RiwayatStatusSurat $riwayat)
    {
        return view('riwayats.edit', compact('riwayat'));
    }

    public function update(Request $request, RiwayatStatusSurat $riwayat)
    {
        $data = $request->validate([
            'permohonan_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'petugas_warga_id' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            
        ]);

        

        $riwayat->update($data);

        return redirect()->route('riwayats.index')->with('success', 'Riwaya1 updated.');
    }

    public function destroy(RiwayatStatusSurat $riwayat)
    {
        $riwayat->delete();
        return redirect()->route('riwayats.index')->with('success', 'Riwayat1 deleted.');
    }
}