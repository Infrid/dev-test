<?php

use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatController::class, 'breeds'])->name('home');
Route::get('/miao/{breedId}', [CatController::class, 'breed'])->name('miao');
Route::get('/search', [CatController::class, 'search'])->name('search');

