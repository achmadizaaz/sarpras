<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilRequest;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        $validated = $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:1024',
            'nama' => 'required',
            'telepon' => 'required',
        ]);

        // dd($validated);

        if($request->file('image')){
            
            if($request->imageLama){
                Storage::delete($request->imageLama);
            }

            $image = $request->file('image');
            $imageName = date('YmdHi')."-".$image->getClientOriginalName();
            $pathImage = $request->image->storeAs('images/profil', $imageName);
        }else{
            $pathImage = $request->imageLama;
        }

        Profil::where('id', $request->id)->update([
            'image' => $pathImage,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat
        ]);

        return back();
    }

    public function ubahSandi(Request $request){

    }

}