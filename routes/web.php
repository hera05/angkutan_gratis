<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\RekapDriverController;
use App\Http\Controllers\RekapAngkutanController;
use App\Http\Controllers\RekapPenumpangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/login', [HomeController::class, 'login'])->name('index.login')->middleware('guest');
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::group(['prefix' => 'superadmin', 'middleware' => ['auth'], 'as' => 'superadmin.'], function () {
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/data-rute', [RuteController::class, 'index'])->name('data-rute');
Route::get('/create-data-rute', [RuteController::class, 'create'])->name('create-data-rute');
Route::post('/simpan-data-rute', [RuteController::class, 'store'])->name('simpan-data-rute');
Route::get('/edit-data-rute/{id}', [RuteController::class, 'edit'])->name('edit-data-rute');
Route::post('/update-data-rute/{id}', [RuteController::class, 'update'])->name('update-data-rute');
Route::delete('/delete-data-rute/{id}', [RuteController::class, 'delete'])->name('delete-data-rute');

Route::get('/data-driver', [DriverController::class, 'index'])->name('data-driver');
Route::get('/create-data-driver', [DriverController::class, 'create'])->name('create-data-driver');
Route::post('/simpan-data-driver', [DriverController::class, 'store'])->name('simpan-data-driver');
Route::get('/edit-data-driver/{id}', [DriverController::class, 'edit'])->name('edit-data-driver');
Route::post('/update-data-driver/{id}', [DriverController::class, 'update'])->name('update-data-driver');

Route::get('/data-mobil', [MobilController::class, 'index'])->name('data-mobil');
Route::get('/create-data-mobil', [MobilController::class, 'create'])->name('create-data-mobil');
Route::post('/simpan-data-mobil', [MobilController::class, 'store'])->name('simpan-data-mobil');
Route::get('/edit-data-mobil/{id}', [MobilController::class, 'edit'])->name('edit-data-mobil');
Route::post('/update-data-mobil/{id}', [MobilController::class, 'update'])->name('update-data-mobil');
Route::post('/delete-data-mobil/{id}', [MobilController::class, 'destroy'])->name('delete-data-mobil');

// Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('/data-pelajar', [PenumpangController::class, 'index'])->name('data-pelajar');
Route::get('/create-data-pelajar', [PenumpangController::class, 'create'])->name('create-data-pelajar');
Route::post('/simpan-data-pelajar', [PenumpangController::class, 'store'])->name('simpan-data-pelajar');
Route::get('/edit-data-pelajar/{id}', [PenumpangController::class, 'edit'])->name('edit-data-pelajar');
Route::post('/update-data-pelajar/{id}', [PenumpangController::class, 'update'])->name('update-data-pelajar');
Route::delete('/delete-data-pelajar/{id}', [PenumpangController::class, 'delete'])->name('delete-data-pelajar');

Route::get('/data-angkutan', [RekapAngkutanController::class, 'index'])->name('data-angkutan');

Route::get('/rekap-driver', [RekapDriverController::class, 'index'])->name('rekap-driver');

Route::get('/rekap-penumpang', [RekapPenumpangController::class, 'index'])->name('rekap-penumpang');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data-akun', [UserController::class, 'index'])->name('data-akun');
Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
// Route::get('/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::get('/profile', [ProfileController::class,'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/filter-driver', [RekapDriverController::class, 'filterDriver'])->name('filter-driver');
Route::get('/cetak-driver', [RekapDriverController::class, 'cetakDriver'])->name('cetak-driver');

Route::get('/filter-penumpang', [RekapPenumpangController::class, 'filterPenumpang'])->name('filter-penumpang');
Route::get('/cetak-penumpang', [RekapPenumpangController::class, 'cetakPenumpang'])->name('cetak-penumpang');

Route::get('/filter-angkutan', [RekapAngkutanController::class, 'filterAngkutan'])->name('filter-angkutan');

Route::get('/cetak-angkutan', [RekapAngkutanController::class, 'cetakAngkutan'])->name('cetak-angkutan');

Route::get('/grafik-angkutan', [RekapAngkutanController::class, 'grafikPenumpang'])->name('grafik.angkutan');

});