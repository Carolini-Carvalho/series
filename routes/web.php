<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\EpisodiosController;

Route::get('/series', [SeriesController::class,'index'])->name('listar_series');
Route::get('/series/create', [SeriesController::class,'create'])->name('form_criar_serie');
Route::post('/series/create', [SeriesController::class,'store']);
Route::delete('/series/{id}', [SeriesController::class,'destroy']);
Route::post('/series/{id}/update', [SeriesController::class,'update'])->name('edita_nome');

Route::get('/series/{serieId}/temporadas', [TemporadasController::class,'index']);

Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class,'index']);
