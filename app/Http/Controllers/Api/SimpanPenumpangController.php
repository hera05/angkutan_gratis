<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SimpanPenumpang;
use Illuminate\Http\Request;

class SimpanPenumpangController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_penumpang' => 'required|string|max:255',
            'alamat_penumpang' => 'required|string|max:255',
            'jenis_penumpang' => 'required|string|max:255',
        ]);

        $penumpang = SimpanPenumpang::create($request->all());

        return response()->json($penumpang, 201);
    }

    public function index()
    {
        $penumpang = SimpanPenumpang::all();
        return response()->json($penumpang, 200);
    }

    public function adminPenumpang(Request $request)
    {
        $query = SimpanPenumpang::query();

        if ($request->has('date')) {
            $query->whereDate('tanggal', $request->input('date'));
        }

        if ($request->has('jenis_penumpang')) {
            $query->where('jenis_penumpang', $request->input('jenis_penumpang'));
        }

        $penumpang = $query->get();

        return response()->json($penumpang);
    }
}
