<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    public function index()
    {
        $sumber = Sumber::all();

        return view('backend.sumber.index', compact('sumber'));
    }

    public function create()
    {
        return view('backend.sumber.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required']
        ]);
        $validated['keterangan'] = $request->keterangan;

        Sumber::create($validated);

        return redirect()->route('sumber.index')->with('success', 'Sumber berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sumber = Sumber::find($id);

        return view('backend.sumber.edit', compact('sumber'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'], 'nama' => ['required'], Rule::unique('sumbers', 'nama')->ignore($request->id)
        ]);
        $validated['keterangan'] = $request->keterangan;

        Sumber::where('id', $request->id)->update($validated);

        return redirect()->route('sumber.index')->with('success', 'Update sumber berhasil');
    }

    public function destroy(Request $request)
    {
        Sumber::where('id', $request->id)->delete();

        return redirect()->route('sumber.index')->with('success', 'Hapus sumber berhasil');
    }

}
