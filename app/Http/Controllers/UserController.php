<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $users = User::get();
        return view('Akun.data-akun', [
            'users' =>$users
        ]);
    }

    function create()
    {
        return view('Akun.create-akun');
    }

    public function store(Request $request)
    {

        // Log::info('Store method called ');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'tlp' => 'required|string|max:15',
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'role' => 'required|in:super_admin,admin,petugas,driver',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $foto      = $request->file('foto');
        $filename   = date('d-m-Y') . $foto->getClientOriginalName();
        $path       = 'photos/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($foto));


        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['alamat']     = $request->alamat;
        $data['tlp']        = $request->tlp;
        $data['foto']       = $filename;
        $data['role']       = $request->role; // Store the role
        

        User::create($data);

        return redirect()->route('superadmin.data-akun')->with('success', 'User created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('Akun.edit-akun', compact('data'));
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
        'alamat' => 'required|string|max:255',
        'tlp' => 'required|string|max:15',
        'foto' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        'role' => 'required|in:super_admin,admin,petugas,driver',
    ]);

    if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    $user = User::find($id);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'tlp' => $request->tlp,
        'role' => $request->role,
    ];

    if ($request->password) {
        $data['password'] = Hash::make($request->password);
    }

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = date('d-m-Y') . '_' . $foto->getClientOriginalName();
        $path = 'photos/' . $filename;

        if ($user->foto) {
            Storage::disk('public')->delete('photos/' . $user->foto);
        }

        Storage::disk('public')->put($path, file_get_contents($foto));
        $data['foto'] = $filename;
    }

    $user->update($data);

    return redirect()->route('superadmin.data-akun');
}


    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->forceDelete();
        }

        return redirect()->route('superadmin.data-akun');
    }


    // function store(Request $request)
    // {
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);


    //     // return redirect()->route('user');
    //     return redirect()->action('App\Http\Controllers\UserController@index');
    // }
}
