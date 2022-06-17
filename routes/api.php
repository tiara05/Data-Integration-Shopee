<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSellerController;
use App\Http\Controllers\ApiProdukController;
use App\Http\Controllers\ApiPemesananController;
use App\Http\Controllers\ApiPengirimanController;
use App\Http\Controllers\ApiPembayaranController;
use App\Http\Controllers\ApiPendapatanController;

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

Route::get('seller', [ApiSellerController::class, 'index']);
Route::post('pendapatan/update', [ApiSellerController::class, 'update']);

Route::get('produk', [ApiProdukController::class, 'index']);

Route::get('pemesanan', [ApiPemesananController::class, 'index']);
Route::post('pemesanan/store', [ApiPemesananController::class, 'store']);
Route::post('pemesananpengiriman/update', [ApiPemesananController::class, 'updatepengiriman']);
Route::post('pemesananpembayaran/update', [ApiPemesananController::class, 'updatepembayaran']);

Route::get('pengiriman', [ApiPengirimanController::class, 'index']);
Route::post('status', [ApiPengirimanController::class, 'status']);
Route::post('pengiriman/store', [ApiPengirimanController::class, 'store']);

Route::get('pembayaran', [ApiPembayaranController::class, 'index']);
Route::post('pembayaran/store', [ApiPembayaranController::class, 'store']);

Route::get('pendapatan', [ApiPendapatanController::class, 'index']);
Route::post('pendapatan/store', [ApiPendapatanController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
