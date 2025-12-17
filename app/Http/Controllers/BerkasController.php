<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    public function index()
    {
        // server-side pagination Laravel
        $berkas = Berkas::latest()->paginate(10);
        return view('berkas.index', compact('berkas'));
    }

    public function create()
    {
        return view('berkas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'permohonan_id' => 'required|string|max:255',
            'nama_berkas' => 'required|string|max:255',
            'valid' => 'boolean',
            
        ]);

        

        Berkas::create($data);

        return redirect()->route('berkas.index')->with('success', 'Berkas created.');
    }

    public function show(Berkas $berkas)
    {
        return view('berkas.show', compact('berkas'));
    }

    public function edit(Berkas $berkas)
    {
        return view('berkas.edit', compact('berkas'));
    }

    public function update(Request $request, Berkas $berkas)
    {
        $data = $request->validate([
            'permohonan_id' => 'required|string|max:255',
            'nama_berkas' => 'required|string|max:255',
            'valid' => 'boolean',
            
        ]);

        

        $berkas->update($data);

        return redirect()->route('berkas.index')->with('success', 'Berkas updated.');
    }

    public function destroy(Berkas $berkas)
    {
        $berkas->delete();
        return redirect()->route('berkas.index')->with('success', 'Berkas deleted.');
    }
}