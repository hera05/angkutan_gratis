<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $rutes = Rute::all();
        return response()->json($rutes);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_rute' => 'required|string|max:255',
        ]);

        // Membuat data pelajar baru
        $rutes = Rute::create([
            'nama_rute' => $request->nama_rute,
        ]);

        // Mengembalikan respon sukses
        return response()->json($rutes, 201);
    }
}
