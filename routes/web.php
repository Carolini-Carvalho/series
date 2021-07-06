<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

//Route::get('/', function () {
 //   return 'hell';
//});

Route::get('/series   ', [SeriesController::class, 'index']);
Route::get('/series/create   ', [SeriesController::class, 'create']);
