<?php


namespace App\Services;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;


class RemovedorDeSerie
{
    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction( function () use ($serieId, $nomeSerie){
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removerSerieETemporadas($serie);
        });

        return $nomeSerie;
    }

    public function removerSerieETemporadas($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerTemporada($temporada);
        });
        $serie->delete();
    }

    public function removerTemporada(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
        $temporada->delete();
    }
}
