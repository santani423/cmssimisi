<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurCleanController;
use App\Http\Controllers\PaketTurUmumController;
use App\Http\Controllers\RuangMediaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SewaTransportasiController;
use App\Http\Controllers\TesTimoniController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('paket', PaketTurUmumController::class);
Route::resource('ruang-media', RuangMediaController::class);
Route::get('/about-as', [HomeController::class, 'abautAs'])->name('about.as');
Route::get('/our-clean', [HomeController::class, 'ourClean'])->name('our.clean');
Route::get('/tes-timoni', [HomeController::class, 'tesTimoni'])->name('tes.timoni');
Route::get('/sewa_transportasi', [HomeController::class, 'sewaTransportasi'])->name('sewa.transportasi');
Route::get('/sewa_transportasi/{id}', [HomeController::class, 'showSewaTransportasi'])->name('sewa.transportasi.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Group routes that require authentication
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cms', [CmsController::class, 'index'])->name('cms');
    Route::get('/profile', [CmsController::class, 'profile'])->name('profile');
    Route::put('/profile', [CmsController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/cms/paket/{code}', [CmsController::class, 'paket'])->name('cms.paket');
    Route::get('/cms/paket/wilayah/{code}', [CmsController::class, 'paketWilayah'])->name('cms.paket');
    Route::get('/cms/paket/create/{code}', [CmsController::class, 'paketCreate'])->name('cms.paket.create');
    Route::post('/cms/paket/store', [CmsController::class, 'paketStore'])->name('cms.paket.store');
    Route::get('/cms/paket/show/{code}', [CmsController::class, 'paketShow'])->name('cms.paket.show');
    Route::get('/cms/paket/edit/{code}', [CmsController::class, 'paketEdit'])->name('cms.paket.edit');
    Route::post('/cms/paket/update/{code}', [CmsController::class, 'paketUpdate'])->name('cms.paket.edit');
    Route::get('/cms/ruang_media', [CmsController::class, 'ruangMeida'])->name('cms.ruang.media');
    Route::get('/cms/ruang_media/show/{code}', [CmsController::class, 'ruangMediaShow'])->name('cms.ruang.media.show');
    Route::get('/cms/ruang_media/create', [CmsController::class, 'ruangMediaCreate'])->name('cms.ruang.media.create');
    Route::post('/cms/ruang_media/store', [CmsController::class, 'ruangMediaStore'])->name('cms.ruang.media.store');
    Route::get('/cms/ruang_media/edit/{code}', [CmsController::class, 'ruangMediaEdit'])->name('cms.ruang.media.edit');

    Route::get('/cms/Banner', [BannerController::class, 'index'])->name('cms.banner');
    Route::get('/cms/Banner/create', [BannerController::class, 'create'])->name('cms.banner.create');
    Route::get('/cms/Banner/edit/{banner}', [BannerController::class, 'edit'])->name('cms.banner.edit');

    Route::get('/cms/tes_timoni', [TesTimoniController::class, 'index'])->name('cms.tes_timoni');
    Route::get('/cms/tes_timoni/create', [TesTimoniController::class, 'create'])->name('cms.tes_timoni.create');
    Route::post('/cms/tes_timoni/store', [TesTimoniController::class, 'store'])->name('cms.tes_timoni.store');
    Route::get('/cms/tes_timoni/edit/{id}', [TesTimoniController::class, 'edit'])->name('cms.tes_timoni.edit');
    Route::put('/cms/tes_timoni/update/{id}', [TesTimoniController::class, 'update'])->name('cms.tes_timoni.update');
    Route::delete('/cms/tes_timoni/edit/{id}', [TesTimoniController::class, 'destroy'])->name('cms.tes_timoni.destroy');
    Route::prefix('cms')
        ->name('cms.')            // <-- menambahkan prefix nama route
        ->group(function () {
            Route::resource('our_clean', OurCleanController::class);
            Route::resource('sewa_transportasi', SewaTransportasiController::class);
            Route::resource('about_us', AboutUsController::class);
        });



    Route::get('/cms/setting', [SettingController::class, 'index'])->name('cms.setting');
    Route::put('/cms/setting', [SettingController::class, 'update'])->name('cms.setting.update');
});
