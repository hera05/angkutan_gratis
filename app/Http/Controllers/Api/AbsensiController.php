<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function store(Request $request)
    {
        $absensi = Absensi::create($request->all());
        return response()->json($absensi, 201);
    }

    public function index()
    {
        $absensis = Absensi::with('driver')->get();
        return response()->json($absensis);

        // // Mengambil absensi beserta user yang memiliki role sebagai driver
        // $absensis = Absensi::whereHas('users', function ($query) {
        //     $query->where('role', 'driver');
        // })->with('users')->get();

        // return response()->json($absensis);

    }

    public function updateStatus(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->status = $request->status;
        $absensi->save();
        return response()->json($absensi);
    }

    public function getApprovedAbsensi()
    {
        $absensi = Absensi::where('status', 'approved')->get();
        return response()->json($absensi);
    }

    public function adminAbsensi(Request $request)
    {
        $query = Absensi::query();

        if ($request->has('date')) {
            $query->whereDate('tanggal', $request->input('date'));
        }

        $absensi = $query->get();

        return response()->json($absensi);
    }
}
