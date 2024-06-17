<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PersonalCitController;

Route::get('/personals', [PersonalController::class, 'index'])->name('personals.index');
Route::resource('personalCit', PersonalCitController::class);
// Agrega más rutas según sea necesario para PersonalCits, etc.
