<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->orWhere('telepon', $request->email)->first();

            if ($user) {
                // if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                return redirect()->intended('dashboard');
                // } else {
                //     return back()->with('error', 'Password salah');
                // }
            } else {
                return back()->with('error', 'Akun belum terdaftar');
            }
        } catch (Exception $e) {
            return view('error');
            dd($e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        } catch (Exception $e) {
            return view('error');
            dd($e->getMessage());
        }
    }

    
}
