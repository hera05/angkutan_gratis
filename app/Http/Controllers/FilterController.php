<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function index(Request $request)
    {
        // Ambil filter dari request
        $tanggal = $request->input('tanggal', '2024-01-21');
        $opsi = $request->input('opsi', 'keberangkatan');
        $sesi = $request->input('sesi', 'sesi1');
        $rute = $request->input('rute', 'brawijaya-sasakperot');

        // Lakukan query untuk mendapatkan data sesuai filter
        $dataAngkutan = []; // Ganti dengan query ke database

        return view('data-angkutan', compact('tanggal', 'opsi', 'sesi', 'rute', 'dataAngkutan'));
    }

    public function filter(Request $request)
    {
        // Panggil method index untuk menangani filter
        return $this->index($request);
    }
}


