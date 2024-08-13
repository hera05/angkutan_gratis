<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class HomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $presensis = Presensi::select('presensis.*', 'users.name')
                        ->join('users', 'presensis.user_id', '=', 'users.id')
                        ->get();
        foreach($presensis as $item) {
            $datetime = Carbon::parse($item->tanggal)->locale('id');

            $datetime->settings(['formatFunction' => 'translatedFormat']);
            
            $item->tanggal = $datetime->format('l, j F Y');
        }
        // dd($presensis);
        return view('home', [
            'presensis' => $presensis
        ]);
    }
    public function login(): View
    {
        return view('login');
    }

    public function dashboard()
    {
        
        $mobil = DB::table('plat_nomors')->count();
        $rute = DB::table('rutes')->count();
        $pelajar = DB::table('data_pelajars')->count();
        $users = DB::table('users')->count();
        return view('dashboard', compact('mobil', 'rute', 'pelajar','users'));

        return abort(403);
    }

}
