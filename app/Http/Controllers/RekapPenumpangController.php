<?php

namespace App\Http\Controllers;

use App\Models\SimpanPenumpang;
use App\Models\SimpanPenumpangUmum;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RekapPenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // Ambil semua data absensi beserta mobil terkait dan user (driver)
        $dtRekapPenumpang = SimpanPenumpang::with(['driver_penumpang.user', 'penumpang'])->get();

        return view('Laporan.rekap-penumpang', compact('dtRekapPenumpang'));
    }


    // public function index()
    // {
    //     $dtRekapPenumpang= SimpanPenumpang::all();
    //     return view('Laporan.rekap-penumpang', compact('dtRekapPenumpang'));
    // }

    /**
     * Show the form for creating a new resource.
     */

    public function filterPenumpang(Request $request)
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
        $dtRekapPenumpang = SimpanPenumpang::whereBetween('created_at', [$formattedDari, $formattedSampai])->get();
    
        // Log jumlah data
        \Log::info("Jumlah data: " . $dtRekapPenumpang->count());
        
    
        // Kembalikan view dengan data absensi yang sudah difilter
        return view('Laporan.rekap-penumpang', ['dtRekapPenumpang' => $dtRekapPenumpang]);
    }

    public function cetakPenumpang()
    {
        $dtCetakPenumpang= SimpanPenumpang::all();
        return view('Cetak.cetak-penumpang', compact('dtCetakPenumpang'));
    }

    public function penumpang_umum()
    {
        // Ambil semua data absensi beserta mobil terkait dan user (driver)
        $dtRekapPenumpangUmum = SimpanPenumpangUmum::with(['driver_penumpang1.user'])->get();

        return view('Laporan.rekap-penumpang-umum', compact('dtRekapPenumpangUmum'));
    }

    public function filterPenumpangUmum(Request $request)
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
        $dtRekapPenumpangUmum = SimpanPenumpangUmum::whereBetween('created_at', [$formattedDari, $formattedSampai])->get();
    
        // Log jumlah data
        \Log::info("Jumlah data: " . $dtRekapPenumpangUmum->count());
        
    
        // Kembalikan view dengan data absensi yang sudah difilter
        return view('Laporan.rekap-penumpang-umum', ['dtRekapPenumpangUmum' => $dtRekapPenumpangUmum]);
    }

    public function cetakPenumpangUmum()
    {
        $dtCetakPenumpangUmum= SimpanPenumpangUmum::all();
        return view('Cetak.cetak-penumpang-umum', compact('dtCetakPenumpangUmum'));
    }

    public function grafikPenumpang()
{
    // Ambil data penumpang dengan relasi
    $dataPenumpang = SimpanPenumpang::with('penumpang')
        ->select('penumpang_id') // Sesuaikan dengan kolom yang digunakan untuk relasi
        ->groupBy('penumpang_id')
        ->get();

    // Menghitung jumlah penumpang per nama
    $total_penumpang = $dataPenumpang->groupBy(function($item) {
        return $item->penumpang->nama_penumpang; // Sesuaikan dengan atribut nama penumpang
    })->map(function($group) {
        return $group->count();
    });

    // Mendapatkan nama penumpang dan jumlahnya
    $nama_penumpang = $total_penumpang->keys()->toArray();
    $jumlah_penumpang = $total_penumpang->values()->toArray();

    return view('penumpang-grafik', compact('nama_penumpang', 'jumlah_penumpang'));
}



    // public function cetakPenumpang(Request $request)
    // {
    //     // Validasi input tanggal
    //     $request->validate([
    //         'dari' => 'required|date',
    //         'sampai' => 'required|date|after_or_equal:dari',
    //     ]);

    //     // Ambil input tanggal
    //     $dari = $request->input('dari');
    //     $sampai = $request->input('sampai');

    //     // Format tanggal untuk debugging
    //     $formattedDari = \Carbon\Carbon::parse($dari)->format('Y-m-d H:i:s');
    //     $formattedSampai = \Carbon\Carbon::parse($sampai)->endOfDay()->format('Y-m-d H:i:s');

    //     // Ambil data absensi berdasarkan rentang tanggal
    //     $dtRekapPenumpang = SimpanPenumpang::whereBetween('created_at', [$formattedDari, $formattedSampai])->get();

    //     // Cetak data penumpang yang sudah difilter
    //     return view('Cetak.cetak-penumpang', ['dtRekapPenumpang' => $dtRekapPenumpang]);
    // }
// {
//     // Validasi input tanggal
//     $request->validate([
//         'dari' => 'required|date',
//         'sampai' => 'required|date|after_or_equal:dari',
//     ]);

//     // Ambil input tanggal
//     $dari = $request->input('dari');
//     $sampai = $request->input('sampai');

//     // Log tanggal yang digunakan
//     \Log::info("Dari: $dari, Sampai: $sampai");

//     // Format tanggal untuk debugging
//     $formattedDari = \Carbon\Carbon::parse($dari)->format('Y-m-d');
//     $formattedSampai = \Carbon\Carbon::parse($sampai)->endOfDay()->format('Y-m-d');

//     \Log::info("Formatted Dari: $formattedDari, Formatted Sampai: $formattedSampai");

//     // Log range yang digunakan dalam query
//     \Log::info("Query range: [$formattedDari, $formattedSampai]");

//     // Ambil data absensi berdasarkan rentang tanggal
//     $dtRekapPenumpang = SimpanPenumpang::whereBetween('tanggal', [$formattedDari, $formattedSampai])->get();

//     // Log jumlah data
//     \Log::info("Jumlah data: " . $dtRekapPenumpang->count());

//     // Kembalikan view dengan data absensi yang sudah difilter
//     return view('Laporan.rekap-penumpang', ['dtRekapPenumpang' => $dtRekapPenumpang]);
// }


    // public function filterPenumpang(Request $request)
    // {
    //     // Validasi input tanggal
    //     $request->validate([
    //         'dari' => 'required|date',
    //         'sampai' => 'required|date|after_or_equal:dari',
    //     ]);
    
    //     // Ambil input tanggal
    //     $dari = $request->input('dari');
    //     $sampai = $request->input('sampai');
    
    //     // Log tanggal yang digunakan
    //     \Log::info("Dari: $dari, Sampai: $sampai");
    
    //     // Format tanggal untuk debugging
    //     $formattedDari = \Carbon\Carbon::parse($dari)->format('Y-m-d H:i:s');
    //     $formattedSampai = \Carbon\Carbon::parse($sampai)->endOfDay()->format('Y-m-d H:i:s');
    
    //     \Log::info("Formatted Dari: $formattedDari, Formatted Sampai: $formattedSampai");
    
    //     // Ambil data absensi berdasarkan rentang tanggal
    //     $dtRekapPenumpang = SimpanPenumpang::whereBetween('tanggal', [$formattedDari, $formattedSampai])->get();
    
    //     // Log jumlah data
    //     \Log::info("Jumlah data: " . $dtRekapPenumpang->count());
        
    
    //     // Kembalikan view dengan data absensi yang sudah difilter
    //     return view('Laporan.rekap-penumpang', ['dtRekapPenumpang' => $dtRekapPenumpang]);
    // }
// {
//     $query = SimpanPenumpang::query();

//     // Filter by start_date if provided
//     if ($request->has('start_date') && $request->start_date != '') {
//         $query->whereDate('created_at', '>=', $request->start_date);
//     }

//     // Filter by end_date if provided
//     if ($request->has('end_date') && $request->end_date != '') {
//         $query->whereDate('created_at', '<=', $request->end_date);
//     }

//     // Retrieve the filtered results
//     $dtRekapPenumpang = $query->get();

//     return view('Laporan.rekap-penumpang', compact('dtRekapPenumpang'));
// }

    

// public function cetakPenumpang(Request $request)
// {
//     $query = SimpanPenumpang::query();

//     // Filter berdasarkan tanggal mulai jika disediakan
//     if ($request->has('start_date') && $request->start_date != '') {
//         $query->whereDate('created_at', '>=', $request->start_date);
//     }

//     // Filter berdasarkan tanggal akhir jika disediakan
//     if ($request->has('end_date') && $request->end_date != '') {
//         $query->whereDate('created_at', '<=', $request->end_date);
//     }

//     // Ambil hasil yang telah difilter
//     $dtCetakPenumpang = $query->get();
//     $start_date = $request->input('start_date');
//     $end_date = $request->input('end_date');

//     // Kirim data ke view
//     return view('Cetak.cetak-penumpang', compact('dtCetakPenumpang', 'start_date', 'end_date'));
// }


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
