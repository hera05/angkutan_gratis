<?php

namespace App\Http\Controllers;

use App\Models\DataPelajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    

    public function index()
    {
        $dtPelajar= DataPelajar::all();
        return view('Pelajar.data-pelajar', compact('dtPelajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pelajar.create-data-pelajar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelajar' => 'required|string|max:255',
            'alamat_pelajar' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama_pelajar']       = $request->nama_pelajar;
        $data['alamat_pelajar']       = $request->alamat_pelajar;
        

        DataPelajar::create($data);

        return redirect()->route('superadmin.data-pelajar')->with('success', 'Data Pelajar Berhasil ditambahkan');
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
        return view('Pelajar.edit-pelajar', compact('pelajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'nama_pelajar' => 'required|string|max:255',
            'alamat_pelajar' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
 
        $pelajar = DataPelajar::find($id);

        $data['nama_pelajar']       = $request->nama_pelajar;
        $data['alamat_pelajar']       = $request->alamat_pelajar;
        

        $pelajar->update($data);

        return redirect()->route('superadmin.data-pelajar')->with('success', 'Data Pelajar Berhasil diubah');

        // $pelajar = DataPelajar::findorfail($id);
        // $pelajar->update($request->all());
        // return redirect('superadmin.data-pelajar');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Request $request, $id)
    {
        $pelajar = DataPelajar::find($id);

        if ($pelajar) {
            $pelajar->forceDelete();
        }

        return redirect()->route('superadmin.data-pelajar')->with('success', 'Data Pelajar Berhasil dihapus');
    }

    public function destroy(string $id)
    {
        //
    }
}
