<?php


namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use DebugBar\DataFormatter\DebugBarVarDumper;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
       $series = Serie::query()->orderBy('nome')->get();
       $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
      {
            $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->qtd_episodios);

            $request->session()->flash('mensagem', "Série {$serie->id}, temporadas e episódios criados com sucesso {$serie->nome}");

            return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('mensagem', "Série $nomeSerie removida com sucesso");

        return redirect()->route('listar_series');
    }

    public function update(Request $request, int $id)
    {
        $newName = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $newName;
        $serie->save();
    }
}
