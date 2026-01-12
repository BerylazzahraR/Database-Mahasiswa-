<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::resource('mahasiswa', MahasiswaController::class);
