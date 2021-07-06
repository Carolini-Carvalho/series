<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

//Route::get('/', function () {
 //   return 'hell';
//});

Route::get('/serie   ', [SeriesController::class, 'index']);
