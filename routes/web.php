<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

//Route::get('/', function () {
 //   return 'hell';
//});

Route::get('/series', [SeriesController::class,'index'])->name('listar_series');
Route::get('/series/create', [SeriesController::class,'create'])->name('form_criar_serie');
Route::post('/series/create', [SeriesController::class,'store']);
Route::delete('/series/{id}', [SeriesController::class,'destroy']);
