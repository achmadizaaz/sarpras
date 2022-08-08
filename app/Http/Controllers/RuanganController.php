<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Ruangan;
use App\Models\SubBangunan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $bangunan = Bangunan::all();
        // $sub_bangunan = SubBangunan::all();
        $ruangan = Ruangan::all();
        return view('backend.ruangan.index', compact('ruangan','bangunan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:sub_bangunans',
            'nama' => 'required',
            'sub_bangunan_id' => 'required'
        ]);

        Ruangan::create($validated);

        return back()->with('success', 'Ruangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $bangunan = Bangunan::all();
        $ruangan = Ruangan::find($id);
        $sub_bangunan = SubBangunan::where('bangunan_id', $ruangan->sub_bangunan->bangunan_id)->get();
        return view('backend.ruangan.edit', compact('ruangan', 'bangunan', 'sub_bangunan'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:sub_bangunans',
            'nama' => 'required',
            'sub_bangunan_id' => 'required'
        ]);

        Ruangan::where('id', $request->id)->update($validated);

        return redirect()->route('ruangan.index')->with('success', 'Updata data ruangan berhasil');
    }

    public function destroy(Request $request)
    {
        Ruangan::where('id', $request->id)->delete();
        
        return redirect()->route('ruangan.index')->with('success', 'Data berhasil di hapus');
    }


}
