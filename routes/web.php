
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Auth\LoginController;

// Route Login dan Logout
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route yang membutuhkan login
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route khusus Petugas harus didaftarkan lebih dahulu
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

    // Route yang boleh diakses semua pengguna yang sudah login
    // Daftarkan setelah route create agar tidak tertangkap sebagai {id}

    Route::resource('surat-masuk', SuratMasukController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-masuk' => 'id']);

    Route::resource('surat-keluar', SuratKeluarController::class)
        ->only(['index', 'show'])
        ->parameters(['surat-keluar' => 'id']);
});
