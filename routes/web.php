<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Auth\LoginController;


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

// Route Login dan Logout
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');



// Route yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    // Route Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route yang boleh diakses semua pengguna yang sudah login
Route::resource('surat-masuk', SuratMasukController::class)
    ->only(['index', 'show'])
    ->parameters(['surat-masuk' => 'id']);

Route::resource('surat-keluar', SuratKeluarController::class)
    ->only(['index', 'show'])
    ->parameters(['surat-keluar' => 'id']);


// Route khusus Petugas
Route::middleware('can:manage-letters')->group(function () {

    // CRUD Surat Masuk
    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['surat-masuk' => 'id']);

    // CRUD Surat Keluar
    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy'])
        ->parameters(['surat-keluar' => 'id']);

});

});