<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\DokumentasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing page — website utama madrasah
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $fotos = \App\Models\DokumentasiFoto::query()->latest('id')->get();
    return view('landing', compact('fotos'));
})->name('landing');

/*
|--------------------------------------------------------------------------
| API publik — daftar foto dokumentasi (JSON)
|--------------------------------------------------------------------------
*/
Route::get('/api/fotos', [DokumentasiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Admin — unggah & kelola dokumentasi
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::get('/register', [AdminRegisterController::class, 'show'])->name('admin.register');
    Route::post('/register', [AdminRegisterController::class, 'store'])->name('admin.register.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin.session')->group(function () {
        Route::get('/', [DokumentasiController::class, 'adminIndex'])->name('admin.fotos');
        Route::post('/fotos', [DokumentasiController::class, 'store'])->name('admin.fotos.store');
        Route::delete('/fotos/{foto}', [DokumentasiController::class, 'destroy'])->name('admin.fotos.destroy');
    });
});
