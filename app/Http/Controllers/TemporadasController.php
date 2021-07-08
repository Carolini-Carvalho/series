<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class TemporadasController extends Controller
{
    public function index(Integer $serieId)
    {
        $temporadas = Serie::find($serieId)->temporadas;

        return view('temporadas.index', compact('temporadas'));
    }
}
