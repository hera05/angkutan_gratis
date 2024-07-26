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
        $dtRekapAngkutan= FormAngkutan::all();
        return view('data-angkutan', compact('dtRekapAngkutan'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function filterAngkutan(Request $request)
    {
        $query = FormAngkutan::query();

        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('created_at', $request->tahun);
        }

        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('created_at', $request->tanggal);
        }
        
        $query->when($request->sesi, function ($query) use ($request) {
            return $query->where('sesi', $request->sesi);
        });

        $dtRekapAngkutan = $query->get();

        return view('data-angkutan', compact('dtRekapAngkutan'));
    }

    public function cetakAngkutan()
    {
        $dtCetakAngkutan= FormAngkutan::all();
        return view('Cetak.cetak-angkutan', compact('dtCetakAngkutan'));
    }

    public function tampilkanAngkutan($id)
    {
        // Ambil data dari model NotaDinas berdasarkan ID atau kriteria lain
        $angkutan = FormAngkutan::find($id);

        // Jika data tidak ditemukan, Anda dapat menangani kondisi ini sesuai kebutuhan
        if (!$angkutan) {
            abort(404); // Contoh: Menampilkan halaman 404 jika data tidak ditemukan
        }

        // Kembalikan tampilan Blade sambil meneruskan variabel $angkutan
        return view('data-angkutan', compact('notaDinas'));
    }

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
