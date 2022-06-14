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

Route::get('produk', [ApiProdukController::class, 'index']);

Route::get('pemesanan', [ApiPemesananController::class, 'index']);

Route::get('pengiriman', [ApiPengirimanController::class, 'index']);
// Route::post('pengiriman/store', [ApiPengirimanController::class, 'store']);

Route::get('pembayaran', [ApiPembayaranController::class, 'index']);

Route::get('pendapatan', [ApiPendapatanController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
