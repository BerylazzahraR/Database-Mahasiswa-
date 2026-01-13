<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/mahasiswa/{mahasiswa}/kartu', [\App\Http\Controllers\MahasiswaController::class, 'kartuPdf'])
    ->name('mahasiswa.kartu.pdf');

Route::resource('mahasiswa', MahasiswaController::class);

use App\Http\Controllers\DosenController;

Route::resource('dosen', DosenController::class);

use App\Http\Controllers\ProdiViewController;

Route::get('/prodi', [ProdiViewController::class, 'index'])->name('prodi.index');
Route::get('/prodi/{prodi}', [ProdiViewController::class, 'show'])->name('prodi.show');
