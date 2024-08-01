<?php

use App\Http\Controllers\Api\AbsensiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DataPelajarController;
use App\Http\Controllers\Api\FormAngkutanController;
use App\Http\Controllers\Api\PlatNomorController;
use App\Http\Controllers\Api\RuteController;
use App\Http\Controllers\Api\SimpanPenumpangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::apiResource('angkutans', AngkutanController::class);
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
});
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::get('/plat-nomors', [PlatNomorController::class, 'index']);
Route::get('/plat-nomors/{plat_nomor}', [PlatNomorController::class, 'index']);
Route::post('/plat-nomors', [PlatNomorController::class, 'store']);
Route::get('/rutes', [RuteController::class, 'index']);
Route::post('/rutes', [RuteController::class, 'store']);

Route::get('/data-angkutan', [FormAngkutanController::class, 'index']);
Route::post('/angkutan', [FormAngkutanController::class, 'store']);
Route::get('/filter-angkutan', [FormAngkutanController::class, 'adminAngkutan']);

Route::get('/pelajar', [DataPelajarController::class, 'index']);
Route::post('/pelajar', [DataPelajarController::class, 'store']);

Route::post('/simpan-penumpang', [SimpanPenumpangController::class, 'store']);
Route::get('/penumpang', [SimpanPenumpangController::class, 'index']); 
Route::get('/filter-penumpang', [SimpanPenumpangController::class, 'adminPenumpang']);

Route::post('/absensi', [AbsensiController::class, 'store']);
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::patch('/absensi/{name}', [AbsensiController::class, 'updateStatus']);
Route::get('/approved-absensi', [AbsensiController::class, 'getApprovedAbsensi']);
Route::get('/filter-absensi', [AbsensiController::class, 'adminAbsensi']);
