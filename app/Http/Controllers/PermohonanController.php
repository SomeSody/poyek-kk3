<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonans = PermohonanSurat::latest()->paginate(9);
        return view('permohonans.index', compact('permohonans'));
    }

    public function create()
    {
        return view('permohonans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_permohonan' => 'required|integer',
            'pemohon_warga_id' => 'required|string|max:255',
            'jenis_id' => 'required|string|max:255',
            'tanggal_pengajuan' => 'nullable|date',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        PermohonanSurat::create($data);

        return redirect()->route('permohonans.index')
            ->with('success', 'Permohonan created.');
    }

    public function show(PermohonanSurat $permohonan)
    {
        return view('permohonans.show', compact('permohonan'));
    }

    public function edit(PermohonanSurat $permohonan)
    {
        return view('permohonans.edit', compact('permohonan'));
    }

    public function update(Request $request, PermohonanSurat $permohonan)
    {
        $data = $request->validate([
            'nomor_permohonan' => 'required|integer',
            'pemohon_warga_id' => 'required|string|max:255',
            'jenis_id' => 'required|string|max:255',
            'tanggal_pengajuan' => 'nullable|date',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $permohonan->update($data);

        return redirect()->route('permohonans.index')
            ->with('success', 'Permohonan updated.');
    }

    public function destroy(PermohonanSurat $permohonan)
    {
        $permohonan->delete();

        return redirect()->route('permohonans.index')
            ->with('success', 'Permohonan deleted.');
    }
}
