<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('backend.barang.index');
    }

    public function create(Request $request)
    {
        return view('backend.barang.create');
    }
}
