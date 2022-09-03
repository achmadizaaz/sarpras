<?php

namespace App\Http\Controllers;

use App\Http\Requests\BangunanRequest;
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

    public function create()
    {
        return view('backend.bangunan.create');
    }

    public function store(BangunanRequest $request)
    {

        Bangunan::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect()->back()->with('success', 'Bangunan berhasil ditambahkan');
    }

    public function edit($slug)
    {
        $bangunan = Bangunan::where('slug', $slug)->first();
        
        return view('backend.bangunan.edit', compact('bangunan'));
    }


    public function update(BangunanRequest $request)
    {
       $bangunan = Bangunan::find($request->id);

       $bangunan->slug = null;

       $bangunan->update([
                    
                    'kode' => $request->kode,
                    'nama' => $request->nama
                ]);

        return redirect()->route('bangunan.index')->with('success', 'Update data telah berhasil');
    }

    public function destroy($id)
    {
        Bangunan::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Hapus data telah berhasil');
    }
}
