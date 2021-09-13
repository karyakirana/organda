<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/metronics', function (){
    return view('pages.dashboard');
});

/**
 * CRUD and Report Mobil
 */
Route::patch('/mobil/list', [\App\Http\Controllers\Master\MobilController::class, 'listMobil'])->name('mobilList');
Route::get('/mobil/edit/{id}', [\App\Http\Controllers\Master\MobilController::class, 'edit']);

/**
 * CRUD adn Report Customer
 */
Route::patch('/customer/list', [\App\Http\Controllers\Master\CustomerController::class, 'listCustomer'])->name('stickerList');
Route::get('/customer/edit/{id}', [\App\Http\Controllers\Master\CustomerController::class, 'edit']);
Route::patch('/test', [\App\Http\Controllers\Master\CustomerController::class, 'test']);

/**
 * CRUD and Report Sticker
 */
Route::get('/sticker/', [\App\Http\Controllers\PlatNomor\StickerController::class, 'index']);
Route::get('/sticker/new', [\App\Http\Controllers\PlatNomor\StickerController::class, 'create']);
Route::patch('/sticker/', [\App\Http\Controllers\PlatNomor\StickerController::class, 'listData']);
Route::post('/sticker/', [\App\Http\Controllers\PlatNomor\StickerController::class, 'store'])->name('sticker');
Route::get('/sticker/{id}', [\App\Http\Controllers\PlatNomor\StickerController::class, 'edit']);
Route::delete('/sticker/{id}', [\App\Http\Controllers\PlatNomor\StickerController::class, 'destroy']);

/**
 * Print Sticker
 */
Route::get('/sticker/print/{id}', [\App\Http\Controllers\PlatNomor\StickerReportController::class, 'print']);

require __DIR__.'/auth.php';
