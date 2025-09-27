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

Route::get('/', [SuratController::class, 'index'])->name('surat.index'); // Halaman utama

// Route untuk Kategori Surat
Route::resource('kategori', KategoriController::class);
