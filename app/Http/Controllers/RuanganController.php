<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\SubBangunan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $bangunan = Bangunan::all();
        $sub_bangunan = SubBangunan::all();
        return view('backend.ruangan.index', compact('bangunan','sub_bangunan'));
    }
}
