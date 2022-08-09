<?php

namespace App\Http\Controllers;

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

}
