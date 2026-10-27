<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;


//ROute Sederhana 

// Route::get('/surat-masuk', function () {
//     return 'Halaman surat masuk';
// });


// //Route dengan parameter

// Route::get('/surat-masuk/{id}', function ($id) {
//     return 'Detail surat masuk dengan id:' .$id;
// });

// //Named route

// Route::get('/surat-masuk', function () {
//     return 'Halaman surat masuk';
// })-> name('surat-masuk.index');

// Route::get('/surat-masuk/{id}', function ($id) {
//     return 'Detail surat masuk dengan id:' .$id;
// })-> name('surat-,asuk.show');



Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Tambahkan route dashboard ini;

Route::get('/surat-masuk', [SuratMasukController::class, 'index'])->name('surat-masuk.index');
Route::get('/surat-masuk/{id}', [SuratMasukController::class, 'show'])->name('surat-masuk.show');

Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
Route::get('/surat-keluar/{id}', [SuratKeluarController::class, 'show'])->name('surat-keluar.show');