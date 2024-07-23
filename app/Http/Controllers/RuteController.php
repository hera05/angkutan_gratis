<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

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
        Rute::create([
            'nama_rute' => $request->nama_rute,
        ]);
        // NotaDinas::create($request->all());

        return redirect('data-rute');
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
        $rute = Rute::findorfail($id);
        $rute->update($request->all());
        return redirect('data-rute');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   

        
}
