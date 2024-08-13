<?php

namespace App\Http\Controllers;

use App\Models\FormAngkutan;
use Illuminate\Http\Request;

class RekapAngkutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Ambil semua data angkutan beserta user (driver) terkait dan data mobil
        $dtRekapAngkutan = FormAngkutan::with(['petugas' => function ($query) {
            $query->where('role', 'petugas');
        }, 'plat_nomor.user', 'plat_nomor.rute'])->get();

        return view('data-angkutan', compact('dtRekapAngkutan'));
    }



    // public function index()
    // {
    //     // Ambil semua mobil beserta user (driver) terkait
    //     $dtRekapAngkutan = FormAngkutan::with(['user' => function ($query) {
    //         $query->where('role', 'petugas');
    //     }])->get();
    //     return view('data-angkutan', compact('dtRekapAngkutan'));
    // }

    /**
     * Show the form for creating a new resource.
     */

    public function filterAngkutan(Request $request) {
        // Validasi input tanggal, sesi, dan rute
        $request->validate([
            'dari' => 'required|date',
            'sampai' => 'required|date|after_or_equal:dari',
            'sesi' => 'nullable|in:sesi 1,sesi 2', // Validasi sesi, opsional
            'rute' => 'nullable|string', // Validasi rute, opsional
        ]);
    
        // Ambil input tanggal, sesi, dan rute
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');
        $sesi = $request->input('sesi');
        $rute = $request->input('rute');
    
        // Log input yang digunakan
        \Log::info("Dari: $dari, Sampai: $sampai, Sesi: $sesi, Rute: $rute");
    
        // Format tanggal untuk debugging
        $formattedDari = \Carbon\Carbon::parse($dari)->format('Y-m-d H:i:s');
        $formattedSampai = \Carbon\Carbon::parse($sampai)->endOfDay()->format('Y-m-d H:i:s');
    
        \Log::info("Formatted Dari: $formattedDari, Formatted Sampai: $formattedSampai");
    
        // Query untuk data absensi berdasarkan rentang tanggal
        $query = FormAngkutan::whereBetween('created_at', [$formattedDari, $formattedSampai]);
    
        // Tambahkan filter sesi jika ada
        if (!empty($sesi)) {
            $query->where('sesi', $sesi);
        }
    
        // Tambahkan filter rute jika ada
        if (!empty($rute)) {
            $query->whereHas('plat_nomor', function ($q) use ($rute) {
                $q->whereHas('rute', function ($query) use ($rute) {
                    $query->where('nama_rute', $rute);
                });
            });
        }
    
        // Ambil data absensi
        $dtRekapAngkutan = $query->get();
    
        // Log jumlah data
        \Log::info("Jumlah data: " . $dtRekapAngkutan->count());
    
        // Kembalikan view dengan data absensi yang sudah difilter
        return view('data-angkutan', ['dtRekapAngkutan' => $dtRekapAngkutan]);
    }
    
    
// {
//     $startDate = $request->input('start_date');
//     $endDate = $request->input('end_date');

//     // Convert d-m-y to Y-m-d
//     if ($startDate) {
//         $startDate = \DateTime::createFromFormat('d-m-Y', $startDate)->format('Y-m-d');
//     }

//     if ($endDate) {
//         $endDate = \DateTime::createFromFormat('d-m-Y', $endDate)->format('Y-m-d');
//     }

//     $query = FormAngkutan::query();

//     if ($startDate) {
//         $query->whereDate('created_at', '>=', $startDate);
//     }

//     if ($endDate) {
//         $query->whereDate('created_at', '<=', $endDate);
//     }

//     $dtRekapAngkutan = $query->get();

//     return view('superadmin.data-angkutan', compact('dtRekapAngkutan'));
// }

    public function cetakAngkutan()
    {
        $dtCetakAngkutan = FormAngkutan::all();

        // Buat array untuk menyimpan data yang sudah dipasangkan
        $pairedData = [];

        // Looping melalui data dan pasangkan keberangkatan dan kedatangan berdasarkan ID atau kriteria lain
        foreach ($dtCetakAngkutan as $item) {
            // Pastikan ada entry dalam pairedData untuk setiap plat_nomor_id
            if (!isset($pairedData[$item->plat_nomor_id])) {
                $pairedData[$item->plat_nomor_id] = ['keberangkatan' => null, 'kedatangan' => null];
            }

            // Pasangkan data berdasarkan opsi
            if ($item->opsi == 'keberangkatan') {
                $pairedData[$item->plat_nomor_id]['keberangkatan'] = $item;
            } elseif ($item->opsi == 'kedatangan') {
                $pairedData[$item->plat_nomor_id]['kedatangan'] = $item;
            }
        }

        return view('Cetak.cetak-angkutan', ['pairedData' => $pairedData]);
    }


    // public function tampilkanAngkutan($id)
    // {
    //     // Ambil data dari model NotaDinas berdasarkan ID atau kriteria lain
    //     $angkutan = FormAngkutan::find($id);

    //     // Jika data tidak ditemukan, Anda dapat menangani kondisi ini sesuai kebutuhan
    //     if (!$angkutan) {
    //         abort(404); // Contoh: Menampilkan halaman 404 jika data tidak ditemukan
    //     }

    //     // Kembalikan tampilan Blade sambil meneruskan variabel $angkutan
    //     return view('data-angkutan', compact('notaDinas'));
    // }

    public function grafikPenumpang()
{
    // Ambil data angkutan yang sudah difilter berdasarkan bulan dan tahun
    $data = FormAngkutan::selectRaw('MONTH(created_at) as bulan, YEAR(created_at) as tahun, COUNT(*) as jumlah')
        ->groupBy('bulan', 'tahun')
        ->get();

    // Format data untuk dikirim ke tampilan
    $data->transform(function ($item) {
        return [
            'bulan' => $item->bulan,
            'jumlah' => $item->jumlah,
        ];
    });

    return view('dashboard', ['dtRekapAngkutan' => $data]);
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
