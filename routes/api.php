<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\JenisPaketController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\RuangMediaController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\TransportasiController;
use App\Http\Controllers\Api\TypePaketController;
use App\Http\Controllers\Api\WilayahController;
use App\Http\Controllers\Api\OurCleanController;
use App\Http\Controllers\Api\sewaTransportasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\StringManipulation\Pass\Pass;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });\

Route::get('/paket', [PaketController::class, 'index'])->name('api.paket.index');
Route::get('/paket/wilayah', [PaketController::class, 'wilayah'])->name('api.paket.wilayah.index');
Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');
Route::get('/paket/{paket}', [PaketController::class, 'show'])->name('paket.show');
Route::post('/paket/update/{paket}', [PaketController::class, 'update'])->name('paket.update');
Route::delete('/paket/{paket}', [PaketController::class, 'destroy'])->name('paket.destroy');
Route::get('/type-paket', [TypePaketController::class, 'index'])->name('api.type-paket'); 
Route::get('/wilayah', [WilayahController::class, 'index'])->name('api.wilayah'); 
Route::get('/wilayah/paket', [WilayahController::class, 'paket'])->name('api.wilayah.paket'); 

Route::get('/transportasi', [TransportasiController::class, 'index'])->name('api.transportasi');
Route::get('/transportasi/{id}', [TransportasiController::class, 'view'])->name('api.transportasi.view'); 

Route::get('/ruang-media', [RuangMediaController::class, 'index'])->name('ruangMedia.index');
Route::post('/ruang-media', [RuangMediaController::class, 'store'])->name('ruang-media.store');
Route::get('/ruang-media/{ruangMedia}', [RuangMediaController::class, 'show'])->name('ruang-media.show');
Route::post('/ruang-media/update/{ruangMedia}', [RuangMediaController::class, 'update'])->name('ruang-media.update');
Route::delete('/ruang-media/{ruangMedia}', [RuangMediaController::class, 'destroy'])->name('ruang-media.destroy'); 




Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
Route::get('/banner/{ruangMedia}', [BannerController::class, 'show'])->name('banner.show');
Route::put('/banner/{ruangMedia}', [BannerController::class, 'update'])->name('banner.update');
Route::delete('/banner/{ruangMedia}', [BannerController::class, 'destroy'])->name('banner.destroy'); 

Route::get('/jenis-paket', [JenisPaketController::class, 'index'])->name('paket.jenis-paket');


Route::get('/our_clean', [OurCleanController::class, 'index'])->name('our_clean.index'); 
Route::get('/our_clean/{id}', [OurCleanController::class, 'show'])->name('our_clean.show'); 
Route::put('/our_clean/update/{id}', [OurCleanController::class, 'update'])->name('our_clean.update'); 
Route::delete('/our_clean/{id}', [OurCleanController::class, 'delete'])->name('our_clean.update'); 

Route::get('/sewa_transportasi', [sewaTransportasi::class, 'index'])->name('sewa_transportasi.index'); 
Route::get('/sewa_transportasi/{id}', [sewaTransportasi::class, 'show'])->name('sewa_transportasi.show'); 
Route::put('/sewa_transportasi/update/{id}', [sewaTransportasi::class, 'update'])->name('sewa_transportasi.update'); 
Route::delete('/sewa_transportasi/{id}', [sewaTransportasi::class, 'delete'])->name('sewa_transportasi.delete'); 




Route::get('/setting', [SettingController::class, 'index'])->name('api.setting.index');
