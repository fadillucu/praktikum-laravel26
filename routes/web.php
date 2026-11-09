<?php

use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
Route::get('/', function () {
    return view('welcome');
});
//sederhana
//Route::get('/surat-masuk', function () {
  //  return ('daftar surat masuk');
//})->name('surat-masuk.index');//parameter
//Route::get('/surat-masuk/{id}', function ($id) {
  //  return ('Surat masuk dengan ID: ' . $id);
//})->name('surat-masuk.show');

  //Route::get('/surat-masuk',[SuratMasukController::class, 'index'])
  //->name('surat-masuk.index');
  //Route::get('/surat-masuk/{id}',[SuratMasukController::class, 'show'])
  //->name('surat-masuk.show');
// Dashboard
Route::get('/', function () {
  return view('dashboard');
})->name('dashboard');

// Surat Masuk
Route::resource('/surat-masuk', SuratMasukController::class)
    ->parameters(['surat-masuk' => 'id'])
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

// Surat Keluar
Route::resource('/surat-keluar', SuratKeluarController::class)
    ->parameters(['surat-keluar' => 'id'])
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);