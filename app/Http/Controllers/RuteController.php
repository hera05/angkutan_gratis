<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $dtRute= Rute::all();
        return view('Rute.data-rute', compact('dtRute'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Rute.create-rute');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_rute' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['nama_rute']       = $request->nama_rute;
        

        Rute::create($data);

        return redirect()->route('superadmin.data-rute')->with('success', 'Data Rute Berhasil ditambahkan');
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
        
        $rute = Rute::findorfail($id);
        return view('Rute.edit-rute', compact('rute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_rute' => 'required|string|max:255',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
 
        $rute = Rute::find($id);

        $data['nama_rute']       = $request->nama_rute;
        

        $rute->update($data);

        return redirect()->route('superadmin.data-rute')->with('success', 'Data Rute Berhasil diubah');
    }

    public function delete(Request $request, $id)
    {
        $rute = Rute::find($id);

        if ($rute) {
            $rute->forceDelete();
        }

        return redirect()->route('superadmin.data-rute')->with('success', 'Data Rute Berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   

        
}
