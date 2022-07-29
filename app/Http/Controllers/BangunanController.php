<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class BangunanController extends Controller
{
    public function index()
    {
        $bangunan = Bangunan::all();
        return view('backend.bangunan.index', compact('bangunan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:bangunans',
            'nama' => 'required'
        ]);

        Bangunan::create($validated);

        return redirect()->back()->with('success', 'Bangunan berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        
        $validated = $request->validate([
            'kode' => 'required|unique:bangunans, kode,'.$request->id,
            'kode' => ['required', Rule::unique('bangunans', 'kode')->ignore($request->id),
        ],
            'nama' => 'required'
        ]);

        Bangunan::where('id', $request->id)->update($validated);

        return redirect()->back()->with('success', 'Update data telah berhasil');
    }

    public function destroy($id)
    {
        Bangunan::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Hapus data telah berhasil');
    }
}
