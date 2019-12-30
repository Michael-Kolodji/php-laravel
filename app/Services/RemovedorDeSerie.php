<?php

namespace App\Services;

use App\{ Episodio, Serie, Temporada};
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removeSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->removeTemporadas($serie);
            $serie->delete();
        });

        return $nomeSerie;
    }

    private function removeTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();        
        });
    }

    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}