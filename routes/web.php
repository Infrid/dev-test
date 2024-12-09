<?php

use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/miao', [CatController::class, 'breeds']);
Route::get('/miao/{breedid}', [CatController::class, 'breed']);

