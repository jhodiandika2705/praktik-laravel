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

Route::resource('surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id']);

    
Route::resource('surat-keluar', SuratKeluarController::class)
    ->parameters(['surat-keluar' => 'id']);