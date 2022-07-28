<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilRequest;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        
        $profil = Profil::where('user_id', $user)->first();
    
       return view('backend.profil.index', compact('profil'));
    }

    public function edit()
    {

        $user = auth()->user()->id;
        
        $profil = Profil::where('user_id', $user)->first();
    
       return view('backend.profil.edit', compact('profil'));
    }

    public function update(ProfilRequest $request)
    {
        // dd($request->file('image'));

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $request->image->storeAs('images/profil', $imageName);

            dd($path);
        }

        // Profil::where('id', $request->id)->update([
        //     'nama' => $request->nama,
        //     'telepon' => $request->telepon,
        //     'alamat' => $request->alamat
        // ]);

        return back();
    }

}