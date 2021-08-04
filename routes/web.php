<?php

use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function (){
    Route::get('/series', [SeriesController::class,'index'])->name('listar_series');
    Route::get('/series/create', [SeriesController::class,'create'])->name('form_criar_serie');
    Route::post('/series/create', [SeriesController::class,'store']);
    Route::delete('/series/remover/{id}', [SeriesController::class,'destroy']);
    Route::post('/series/{id}/update', [SeriesController::class,'update']);

    Route::get('/series/{serieId}/temporadas', [TemporadasController::class,'index']);

    Route::get('/series/{serie}/temporadas/{numero_temporada}/episodios', [EpisodiosController::class,'index']);
    Route::get('/temporadas/{temporada}/episodios/assistir', [EpisodiosController::class,'assistir']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';


