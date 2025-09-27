<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuratController;
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

Route::get('/', [SuratController::class, 'index'])->name('surat.index');
Route::resource('kategori', KategoriController::class);
Route::get('/', [SuratController::class, 'index'])->name('surat.index');
Route::resource('surat', SuratController::class)->except(['index']);
Route::get('/surat/download/{id}', [SuratController::class, 'download'])->name('surat.download');
Route::get('/about', function () {
    return view('about');
})->name('about');
