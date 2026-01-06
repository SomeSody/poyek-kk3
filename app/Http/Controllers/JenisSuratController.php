<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\JenisSurat;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterableColumns = ['syarat'];
        $searchableColumns = ['kode', 'nama_jenis', 'syarat'];
        
        $jenis_surat = JenisSurat::paginate(9);    
        return view('jenis_surat.index', compact('jenis_surat'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'kode' => 'required|numeric|unique:jenis_surat,kode',
            'nama_jenis' => 'required|string|max:255',
            'syarat' => 'required',        
        ], [
            'kode.required' => 'Kode surat wajib diisi',
            'kode.numeric' => 'Kode surat harus berupa angka',
            'kode.unique' => 'Kode surat sudah digunakan',
            'nama_jenis.required' => 'Nama jenis surat wajib diisi',
            'nama_jenis.max' => 'Nama jenis surat maksimal 255 karakter',
            'syarat.required' => 'Syarat wajib diisi',
        ]);

        JenisSurat::create($validated);

        return redirect()->route('jenis_surat.index')
        ->with('success', 'Data Jenis Surat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis_surat = JenisSurat::findOrFail($id);
        return view('jenis_surat.show', compact('jenis_surat'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataJenisSurat'] = JenisSurat::findOrFail($id);
        return view('jenis_surat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $validated = $request->validate([
            'kode' => 'required|numeric|unique:jenis_surat,kode,' . $id . ',jenis_id',
            'nama_jenis' => 'required|string|max:255',
            'syarat' => 'required',
        ], [
            'kode.required' => 'Kode surat wajib diisi',
            'kode.numeric' => 'Kode surat harus berupa angka',
            'kode.unique' => 'Kode surat sudah digunakan',
            'nama_jenis.required' => 'Nama jenis surat wajib diisi',
            'nama_jenis.max' => 'Nama jenis surat maksimal 255 karakter',
            'syarat.required' => 'Syarat wajib diisi',
        ]);

        $jenisSurat->update($validated);

        return redirect()->route('jenis_surat.index')
            ->with('success', 'Data Jenis Surat berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $jenisSurat->delete();
        return redirect()->route('jenis_surat.index')
        ->with('success,', 'data berhasil dihapus');
    }
}
