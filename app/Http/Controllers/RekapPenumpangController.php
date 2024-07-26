<?php

namespace App\Http\Controllers;

use App\Models\SimpanPenumpang;
use Illuminate\Http\Request;

class RekapPenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $dtRekapPenumpang= SimpanPenumpang::all();
        return view('Laporan.rekap-penumpang', compact('dtRekapPenumpang'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function filterPenumpang(Request $request)
    {
        $query = SimpanPenumpang::query();

        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('created_at', $request->tahun);
        }

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('created_at', $request->tanggal);
        }

        $dtRekapPenumpang = $query->get();

        return view('Laporan.rekap-penumpang', compact('dtRekapPenumpang'));
    }

    public function cetakPenumpang()
    {
        $dtCetakPenumpang= SimpanPenumpang::all();
        return view('Cetak.cetak-penumpang', compact('dtCetakPenumpang'));
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
