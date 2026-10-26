<?php

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

Route::get('/surat-masuk',[SuratMasukController::class, 'index'])
->name('surat-masuk.index');
Route::get('/surat-masuk/{id}',[SuratMasukController::class, 'show'])
->name('surat-masuk.show');
Route::get('/surat-keluar', [SuratMasukController::class, 'suratKeluar'])
->name('surat-keluar.index');
Route::get('/surat-keluar/{id}', [SuratMasukController::class,'Detail'])
->name('surat-keluar.show');


Route::get('/', function () {
  return view('dashboard');
})->name('dashboard');
