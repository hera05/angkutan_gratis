<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plat_nomor;
use Illuminate\Http\Request;

class PlatNomorController extends Controller
{
    public function index()
    {
        $platNomors = Plat_nomor::all();
        return response()->json($platNomors);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'plat_nomor' => 'required|string|max:255',
        ]);

        // Membuat data pelajar baru
        $platNomors = Plat_nomor::create([
            'plat_nomor' => $request->plat_nomor,
        ]);

        // Mengembalikan respon sukses
        return response()->json($platNomors, 201);
    }
}
