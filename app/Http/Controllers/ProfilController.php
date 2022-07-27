<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(){
        $user = auth()->user()->id;
        
        $profil = Profil::where('user_id', $user)->first();
    
       return view('backend.profil.index', compact('profil'));
    }
}
