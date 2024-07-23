<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtDriver= Driver::all();
        return view('Driver.data-driver', compact('dtDriver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Driver.create-driver');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Driver::create([
            'nama_driver' => $request->nama_driver,
            'nik_driver' => $request->nik_driver,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $request->foto,
            'status' => $request->status,
        ]);
        // NotaDinas::create($request->all());

        return redirect('data-driver');
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
        $driver = Driver::findorfail($id);
        return view('Driver.edit-driver', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $driver = Driver::findorfail($id);
        $driver->update($request->all());
        return redirect('data-driver');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
