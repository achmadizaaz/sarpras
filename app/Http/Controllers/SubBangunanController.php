<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\SubBangunan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubBangunanController extends Controller
{
    public function index()
    {
        $bangunan = Bangunan::all();
        $sub_bangunan = SubBangunan::with('bangunan')->get();;
        return view('backend.sub-bangunan.index', compact('bangunan','sub_bangunan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:sub_bangunans',
            'bangunan_id' => 'required',
            'nama' => 'required'
        ]);

        SubBangunan::create($validated );

        return back()->with('success', 'Data telah berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'kode' => ['required', Rule::unique('sub_bangunans', 'kode')
                ->ignore($request->id)],
            'bangunan_id' => 'required',
            'nama' => 'required'
        ]); 

        SubBangunan::where('id', $request->id)->update($validated);

        return redirect()->route('sub-bangunan.index')->with('success', 'Edit data telah berhasil');
    }

    public function destroy($id)
    {
        SubBangunan::where('id', $id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
