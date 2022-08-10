<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('backend.kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('backend.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:kategoris'
        ]);
        $validated['keterangan'] = $request->keterangan;


        Kategori::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('backend.kategori.edit', compact('kategori'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => [
                'required', Rule::unique('kategoris', 'nama')->ignore($request->id)
            ]
        ]);

        $validated['keterangan'] = $request->keterangan;

        Kategori::where('id', $request->id)->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Update kategori berhasil');


    }

    public function destroy(Request $request)
    {
       
        Kategori::where('id', $request->id)->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }

}
