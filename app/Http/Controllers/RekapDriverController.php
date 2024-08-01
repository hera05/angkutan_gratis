<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RekapDriverController extends Controller
{
    public function index() {
    $dtRekapDriver= Absensi::all();
    return view('Laporan.rekap-driver', compact('dtRekapDriver'));
    }

    public function filterDriver(Request $request)
{
    // Validasi input tanggal
    $request->validate([
        'dari' => 'required|date',
        'sampai' => 'required|date|after_or_equal:dari',
    ]);

    // Ambil input tanggal
    $dari = $request->input('dari');
    $sampai = $request->input('sampai');

    // Log tanggal yang digunakan
    \Log::info("Dari: $dari, Sampai: $sampai");

    // Format tanggal untuk debugging
    $formattedDari = \Carbon\Carbon::parse($dari)->format('Y-m-d H:i:s');
    $formattedSampai = \Carbon\Carbon::parse($sampai)->endOfDay()->format('Y-m-d H:i:s');

    \Log::info("Formatted Dari: $formattedDari, Formatted Sampai: $formattedSampai");

    // Ambil data absensi berdasarkan rentang tanggal
    $dtRekapDriver = Absensi::whereBetween('created_at', [$formattedDari, $formattedSampai])->get();

    // Log jumlah data
    \Log::info("Jumlah data: " . $dtRekapDriver->count());
    

    // Kembalikan view dengan data absensi yang sudah difilter
    return view('Laporan.rekap-driver', ['dtRekapDriver' => $dtRekapDriver]);
}


    // public function filterDriver(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $query = Absensi::query(); // Assuming you're filtering the Absensi model

    //     if ($start_date) {
    //         $query->where('created_at', '>=', $start_date);
    //     }

    //     if ($end_date) {
    //         $query->where('created_at', '<=', $end_date);
    //     }

    //     $dtRekapDriver = $query->get();

    //     return view('Laporan.rekap-driver', compact('dtRekapDriver'));
    // }
    
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $query = Absensi::query();

    //     if ($start_date) {
    //         $query->whereDate('created_at', '>=', Carbon::createFromFormat('Y-m-d', $start_date)->format('Y-m-d'));
    //     }

    //     if ($end_date) {
    //         $query->whereDate('created_at', '<=', Carbon::createFromFormat('Y-m-d', $end_date)->format('Y-m-d'));
    //     }

    //     $dtRekapDriver = $query->select('name', 
    //                                     \DB::raw('MIN(datang_time) as datang_time'), 
    //                                     \DB::raw('MAX(selesai_time) as selesai_time'), 
    //                                     \DB::raw('MIN(created_at) as created_at'), 
    //                                     'izin_alasan',
    //                                     'izin_time',
    //                                     \DB::raw('MAX(status) as status'))
    //                             ->groupBy('name', 'izin_alasan', 'izin_time')
    //                             ->orderBy('name')
    //                             ->get()
    //                             ->map(function($item) {
    //                                 $item->created_at = Carbon::parse($item->created_at)->format('d/m/Y');
    //                                 $item->datang_time = Carbon::parse($item->datang_time)->format('d/m/Y H:i:s');
    //                                 $item->selesai_time = Carbon::parse($item->selesai_time)->format('d/m/Y H:i:s');
    //                                 if ($item->izin_time) {
    //                                     $item->izin_time = Carbon::parse($item->izin_time)->format('d/m/Y H:i:s');
    //                                 }
    //                                 return $item;
    //                             });

    //     return view('Laporan.rekap-driver', compact('dtRekapDriver'));    
    // }

    public function cetakDriver(Request $request)
    {
        // Ambil input tanggal
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        // Validasi input tanggal
        $request->validate([
            'dari' => 'required|date_format:d/m/Y',
            'sampai' => 'required|date_format:d/m/Y|after_or_equal:dari',
        ]);

        // Format tanggal
        $formattedDari = Carbon::createFromFormat('d/m/Y', $dari)->startOfDay()->format('Y-m-d H:i:s');
        $formattedSampai = Carbon::createFromFormat('d/m/Y', $sampai)->endOfDay()->format('Y-m-d H:i:s');

        // Ambil data absensi berdasarkan rentang tanggal
        $dtCetakDriver = Absensi::whereBetween('created_at', [$formattedDari, $formattedSampai])->get();

        // Format data
        $dtCetakDriver = $dtCetakDriver->map(function($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('d/m/Y');
            $item->datang_time = Carbon::parse($item->datang_time)->format('d/m/Y H:i:s');
            $item->selesai_time = Carbon::parse($item->selesai_time)->format('d/m/Y H:i:s');
            if ($item->izin_time) {
                $item->izin_time = Carbon::parse($item->izin_time)->format('d/m/Y H:i:s');
            }
            return $item;
        });

        // Kembalikan view cetak
        return view('Cetak.cetak-driver', [
            'dtCetakDriver' => $dtCetakDriver,
            'dari' => $dari,
            'sampai' => $sampai
        ]);
    }

    // public function cetakDriver(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $query = Absensi::query();

    //     if ($start_date) {
    //         $query->whereDate('created_at', '>=', Carbon::createFromFormat('Y-m-d', $start_date)->format('Y-m-d'));
    //     }

    //     if ($end_date) {
    //         $query->whereDate('created_at', '<=', Carbon::createFromFormat('Y-m-d', $end_date)->format('Y-m-d'));
    //     }

    //     $dtCetakDriver = $query->select('name', 
    //                                     \DB::raw('MIN(datang_time) as datang_time'), 
    //                                     \DB::raw('MAX(selesai_time) as selesai_time'), 
    //                                     \DB::raw('MIN(created_at) as created_at'), 
    //                                     'izin_alasan',
    //                                     'izin_time',
    //                                     \DB::raw('MAX(status) as status'))
    //                             ->groupBy('name', 'izin_alasan', 'izin_time')
    //                             ->orderBy('name')
    //                             ->get()
    //                             ->map(function($item) {
    //                                 $item->created_at = Carbon::parse($item->created_at)->format('d/m/Y');
    //                                 $item->datang_time = Carbon::parse($item->datang_time)->format('d/m/Y H:i:s');
    //                                 $item->selesai_time = Carbon::parse($item->selesai_time)->format('d/m/Y H:i:s');
    //                                 if ($item->izin_time) {
    //                                     $item->izin_time = Carbon::parse($item->izin_time)->format('d/m/Y H:i:s');
    //                                 }
    //                                 return $item;
    //                             });

    //     return view('Cetak.cetak-driver', compact('dtCetakDriver', 'start_date', 'end_date'));
    // }

    // Metode lainnya...

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
