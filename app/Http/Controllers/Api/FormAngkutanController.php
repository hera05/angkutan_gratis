<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormAngkutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormAngkutanController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string',
            'nama_driver' => 'required|string',
            'nama_rute' => 'required|string',
            'opsi' => 'required|string|in:Keberangkatan,Kedatangan',
            'sesi' => 'required|string|in:Sesi 1,Sesi 2',
            'jumlah_penumpang' => 'required|integer',
            'gambar' => 'required|string',
        ]);

        $gambarPath = null;
        if ($request->gambar) {
            $gambarData = base64_decode($request->gambar);
            $gambarName = uniqid() . '.png';
            Storage::disk('public')->put('photos/' . $gambarName, $gambarData);
            $gambarPath = 'photos/' . $gambarName;
        }

        $angkutan = FormAngkutan::create([
            'plat_nomor' => $request->plat_nomor,
            'nama_driver' => $request->nama_driver,
            'nama_rute' => $request->nama_rute,
            'opsi' => $request->opsi,
            'sesi' => $request->sesi,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'gambar' => $gambarPath,
        ]);

        return response()->json([
            'message' => 'Data angkutan berhasil disimpan',
            'angkutan' => $angkutan
        ], 201);
    }

    public function index()
    {
        $angkutan = FormAngkutan::all();
        return response()->json($angkutan, 200);
    }

    public function adminAngkutan(Request $request)
    {
        $query = FormAngkutan::query();

        if ($request->has('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        if ($request->has('session')) {
            $query->where('sesi', $request->input('session'));
        }

        if ($request->has('rute')) {
            $query->where('rute', $request->input('rute'));
        }

        $angkutan = $query->get();

        return response()->json($angkutan);
    }
}
