<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;

class JenissuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataJenisSurat'] = JenisSurat::all();
        return view('admin.jenis_surat.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data['kode'] = $request->kode;
        $data['nama_jenis'] = $request->nama_jenis;
        $data['syarat_json'] = $request->syarat_json;

        JenisSurat::create($data);

        return redirect()->route('jenis_surat.index')->with('success', 'Data Jenis Surat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataJenisSurat'] = JenisSurat::findOrFail($id);
        return view('admin.jenis_surat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis_id = $id;
        $jenisSurat = JenisSurat::findOrFail($jenis_id);

        $jenisSurat->kode = $request->kode;
        $jenisSurat->nama_jenis = $request->nama_jenis;
        $jenisSurat->syarat_json = $request->syarat_json;

        $jenisSurat->save();

        return redirect()->route('jenis_surat.index')->with('update', 'Perubahan data berhasil!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $jenisSurat->delete();
        return redirect()->route('jenis_surat.index')->with('succes,', 'data berhasil dihapus');
    }
}
