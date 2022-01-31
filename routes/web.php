<?php

use App\Http\Controllers\TravelGuideController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TravelGuideController::class, 'index'])->name('index');
Route::get('fetch', [TravelGuideController::class, 'create'])->name('fetch');
Route::post('export', [TravelGuideController::class, 'create'])->name('export');