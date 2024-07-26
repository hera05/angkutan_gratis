<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class RekapDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $dtRekapDriver= Absensi::all();
        return view('Laporan.rekap-driver', compact('dtRekapDriver'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function filterDriver(Request $request)
    {
        $query = Absensi::query();

        // $bulan = $request->input('bulan');
        // $tahun = $request->input('tahun');
        // $tanggal = $request->input('tanggal');

        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('created_at', $request->tahun);
        }

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('created_at', $request->tanggal);
        }

        $dtRekapDriver = $query->get();

        return view('Laporan.rekap-driver', compact('dtRekapDriver'));
    }

    public function cetakDriver()
    {
        $dtCetakDriver= Absensi::all();
        return view('Cetak.cetak-driver', compact('dtCetakDriver'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
