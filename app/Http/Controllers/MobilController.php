<?php

namespace App\Http\Controllers;

use App\Models\Plat_nomor;
use App\Models\User;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {

        // Ambil semua mobil beserta user (driver) dan rute terkait
        $dtMobil = Plat_nomor::with(['user' => function ($query) {
            $query->where('role', 'driver');
        }, 'rute'])->get();

        return view('Mobil.data-mobil', compact('dtMobil'));


        // // Ambil semua mobil beserta user (driver) terkait
        // $dtMobil = Plat_nomor::with(['user' => function ($query) {
        //     $query->where('role', 'driver');
        // }])->get();

        // return view('Mobil.data-mobil', compact('dtMobil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Ambil semua user dengan peran driver
            $drivers = User::where('role', 'driver')->get();
            // Ambil semua rute
            $rutes = Rute::all();

            return view('Mobil.create-mobil', compact('drivers', 'rutes'));
        // // Ambil semua user dengan peran driver
        // $drivers = User::where('role', 'driver')->get();

        // return view('Mobil.create-mobil', compact('drivers'));
        // ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merek_mobil' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255',
            'no_stnk' => 'required|string|max:255',
            'status_pajak' => 'required|in:Aktif,Tidak Aktif',
            'uji_kir' => 'required|in:Sudah,Belum',
            'jumlah_kursi' => 'nullable|integer|max:30', // make jumlah_kursi nullable
            'user_id' => 'required|exists:users,id',
            'rute_id' => 'required|exists:rutes,id', // Validasi untuk rute_id
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['merek_mobil']       = $request->merek_mobil;
        $data['plat_nomor']      = $request->plat_nomor;
        $data['no_stnk']     = $request->no_stnk;
        $data['status_pajak']       = $request->status_pajak; // Store the status pajak
        $data['uji_kir']       = $request->uji_kir; // Store the uji kir
        $data['jumlah_kursi']       = $request->jumlah_kursi; // Store the uji kir
        $data['user_id']       = $request->user_id; // Store the uji kir
        $data['rute_id']       = $request->rute_id; // Store the uji kir
       
        

        Plat_nomor::create($data);

        return redirect()->route('superadmin.data-mobil')->with('success', 'Data Mobil Berhasil ditambahkan');
        // Plat_nomor::create([
        //     'plat_nomor' => $request->plat_nomor,
        // ]);
        // NotaDinas::create($request->all());

        // return redirect('superadmin.data-mobil');
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

    public function edit($id)
    {
        $data = Plat_nomor::findOrFail($id);
        $drivers = User::where('role', 'driver')->get();
        $rutes = Rute::all();

        return view('Mobil.edit-mobil', compact('data', 'drivers', 'rutes'));
    }


    // public function edit(string $id)
    // {
    //     $mobil = Plat_nomor::findorfail($id);
    //     return view('Mobil.edit-mobil', compact('mobil'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'merek_mobil' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255',
            'no_stnk' => 'required|string|max:255',
            'status_pajak' => 'required|in:Aktif,Tidak Aktif',
            'uji_kir' => 'required|in:Sudah,Belum',
            'jumlah_kursi' => 'required|integer|max:30',
            'user_id' => 'required|exists:users,id',
            'rute_id' => 'required|exists:rutes,id',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $mobil = Plat_nomor::find($id);

        $data['merek_mobil']        = $request->merek_mobil;
        $data['plat_nomor']         = $request->plat_nomor;
        $data['no_stnk']            = $request->no_stnk;
        $data['status_pajak']       = $request->status_pajak; // Store the status pajak
        $data['uji_kir']            = $request->uji_kir; // Store the uji kir
        $data['jumlah_kursi']       = $request->jumlah_kursi; // Store the uji kir
        $data['user_id']            = $request->user_id; // Store the uji kir
        $data['rute_id']            = $request->rute_id; // Store the uji kir
    
        $mobil->update($data);
    
        return redirect()->route('superadmin.data-mobil')->with('success', 'Data Mobil Berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        // Temukan data berdasarkan ID
        $data = Plat_nomor::find($id);

        if ($data) {
            // Hapus data secara permanen
            $data->forceDelete();
            
            // Redirect dengan pesan sukses
            return redirect()->route('superadmin.data-mobil')->with('success', 'Data Mobil Berhasil dihapus.');
        } else {
            // Redirect jika data tidak ditemukan
            return redirect()->route('superadmin.data-mobil')->with('error', 'Data Mobil tidak ditemukan.');
        }
    }


    // public function destroy(string $id)
    // {
    //     $data = Plat_nomor::find($id);

    //     if ($data) {
    //         $data->forceDelete();
    //     }

    //     return redirect()->route('superadmin.data-mobil')->with('success', 'Data Mobil Berhasil dihapus.');
    // }
}
