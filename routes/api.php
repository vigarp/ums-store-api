<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Item_PenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Models\Item_Penjualan;
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

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/{id_pelanggan}', [PelangganController::class, 'show']);
Route::post('/pelanggan', [PelangganController::class, 'store']);
Route::put('/pelanggan/{id_pelanggan}', [PelangganController::class, 'update']);
Route::delete('/pelanggan/{id_pelanggan}', [PelangganController::class, 'destroy']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'store']);
Route::get('/barang/{id_barang}', [BarangController::class, 'show']);
Route::put('/barang/{id_barang}', [BarangController::class, 'update']);
Route::delete('/barang/{id_barang}', [BarangController::class, 'destroy']);

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::post('/penjualan', [PenjualanController::class, 'store']);
Route::get('/penjualan/{id_penjualan}', [PenjualanController::class, 'show']);
Route::put('/penjualan/{id_penjualan}', [PenjualanController::class, 'update']);
Route::delete('/penjualan/{id_penjualan}', [PenjualanController::class, 'destroy']);

Route::get('/item_penjualan', [Item_PenjualanController::class, 'index']);
Route::post('/item_penjualan', [Item_PenjualanController::class, 'store']);
Route::get('/item_penjualan/{id_item_penjualan}', [Item_PenjualanController::class, 'show']);
Route::delete('/item_penjualan/{id_penjualan}', [Item_PenjualanController::class, 'destroy']);

Route::get('/history/{id_penjualan}', [HistoryController::class, 'show']);
Route::get('/detail/{id_nota}', [DetailController::class, 'show']);