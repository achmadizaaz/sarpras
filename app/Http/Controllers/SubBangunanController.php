<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class SubBangunanController extends Controller
{
    public function index()
    {
        $bangunan = Bangunan::all();
        return view('backend.sub-bangunan.index', compact('bangunan'));
    }
}
