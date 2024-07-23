<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataPelajar;
use Illuminate\Http\Request;

class DataPelajarController extends Controller
{
    public function index()
    {
        $pelajar = DataPelajar::all();
        return response()->json($pelajar);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama_pelajar' => 'required|string|max:255',
            'alamat_pelajar' => 'required|string|max:255',
        ]);

        // Membuat data pelajar baru
        $pelajar = DataPelajar::create([
            'nama_pelajar' => $request->nama_pelajar,
            'alamat_pelajar' => $request->alamat_pelajar,
        ]);

        // Mengembalikan respon sukses
        return response()->json($pelajar, 201);
    }
}
