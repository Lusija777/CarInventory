<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::resource('cars', CarController::class);
Route::resource('parts', PartController::class);


