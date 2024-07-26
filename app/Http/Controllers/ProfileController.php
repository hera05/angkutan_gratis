<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Profile.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'alamat' => 'required|string|max:255',
            'tlp' => 'required|string|max:15',
            'foto' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'role' => 'required|in:super_admin,admin,petugas,driver',
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
            'role' => $request->role,
        ];

        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->alamat = $request->input('alamat');
        // $user->tlp = $request->input('tlp');

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

        // if (!is_null($request->input('current_password'))) {
        //     if (Hash::check($request->input('current_password'), $user->password)) {
        //         $user->password = $request->input('new_password');
        //     } else {
        //         return redirect()->back()->withInput();
        //     }
        // }

        $user->save();

        return redirect()->route('superadmin.profile')->withSuccess('Profile updated successfully.');
    }
}
