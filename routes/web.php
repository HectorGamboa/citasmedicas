<?php

use App\Http\Controllers\SpecialtyController;
use App\Models\Specialty;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Specialty
Route::get('/specialties',[App\Http\Controllers\SpecialtyController::class, 'index']);
Route::get('/specialties/create', [App\Http\Controllers\SpecialtyController::class, 'create'])-> name('create');//form de register
Route::get('/specialties/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::put('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);//actualizar
Route::delete('/specialties/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);//eliminar
Route::post('/specialties',[App\Http\Controllers\SpecialtyController::class, 'store']) -> name('store');//envio del form