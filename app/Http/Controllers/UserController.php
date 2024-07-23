<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // return redirect()->route('user');
        return redirect()->action('App\Http\Controllers\UserController@index');
    }
}
