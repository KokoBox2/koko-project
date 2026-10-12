<?php

use App\Http\Controllers\AlcBrandController;
use App\Http\Controllers\AlcTypeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::resource('alcTypes', AlcTypeController::class)->except(['show']);
Route::resource('alcBrands', AlcBrandController::class)->except(['show']);
