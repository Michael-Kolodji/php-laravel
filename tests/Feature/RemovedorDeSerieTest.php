<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var Serie */    
    private $serieCriada;

    public function setup(): void
    {
        parent::setUp();
        $criadorDeSerie = new CriadorDeSerie();
        $this->serieCriada = $criadorDeSerie->criarSerie('Nome de Teste', 1, 1);
    }
    public function testRemoverUmaserie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serieCriada->id]);

        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removeSerie($this->serieCriada->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome de Teste', $this->serieCriada->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serieCriada->id]);
    }
}
