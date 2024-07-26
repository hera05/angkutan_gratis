<?php

namespace App\Http\Controllers;

use App\Models\Plat_nomor;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $dtMobil= Plat_nomor::all();
        return view('Mobil.data-mobil', compact('dtMobil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Mobil.create-mobil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Plat_nomor::create([
            'plat_nomor' => $request->plat_nomor,
        ]);
        // NotaDinas::create($request->all());

        return redirect('superadmin.data-mobil');
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
        $mobil = Plat_nomor::findorfail($id);
        return view('Mobil.edit-mobil', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mobil = Plat_nomor::findorfail($id);
        $mobil->update($request->all());
        return redirect('superadmin.data-mobil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
