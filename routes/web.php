<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;


Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/surat-masuk',[SuratMasukController::class,'index'])->name('surat-masuk.index');

Route::get('/surat-masuk/{id}',[SuratMasukController::class,'show'])->name('surat-masuk.show');

