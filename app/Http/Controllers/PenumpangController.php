<?php

namespace App\Http\Controllers;

use App\Models\DataPelajar;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        $dtPelajar= DataPelajar::all();
        return view('data-pelajar', compact('dtPelajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-data-pelajar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DataPelajar::create([
            'nama_pelajar' => $request->nama_pelajar,
            'alamat' => $request->alamat,
            // 'jenis_penumpang' => $request->jenis_penumpang,
        ]);
        // NotaDinas::create($request->all());

        return redirect('data-pelajar');
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
        $pelajar = DataPelajar::findorfail($id);
        return view('edit-pelajar', compact('pelajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelajar = DataPelajar::findorfail($id);
        $pelajar->update($request->all());
        return redirect('data-pelajar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
