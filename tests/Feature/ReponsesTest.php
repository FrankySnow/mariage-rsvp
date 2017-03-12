<?php

namespace Tests\Feature;

use App\Reponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReponsesTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * @test
     */
    public function on_peut_obtenir_une_liste_de_réponses_en_json()
    {
    	$reponses = factory(Reponse::class,10)->create();

        $response = $this->getJson( route('api.reponses.index') );

        $response
        	->assertStatus(200)
        	->assertJson([ 'data' => $reponses->toArray() ]);
    }

    /** @test */
    public function on_peut_obtenir_une_réponse_en_json()
    {
    	$reponse = factory(Reponse::class)->create();

        $response = $this->getJson( route('api.reponses.show',1) );

        $response
        	->assertStatus(200)
        	->assertJson([ 'data' => $reponse->toArray() ]);
    }

    /** @test */
    public function on_ne_peut_pas_obtenir_une_réponse_qui_n_existe_pas()
    {
    	$reponse = factory(Reponse::class)->create();

        $response = $this->getJson( route('api.reponses.show',2) );

        $response
        	->assertStatus(404)
        	->assertJsonFragment([ 'erreur' ]);
    }

    /** @test */
    public function on_peut_ajouter_une_réponse()
    {
    	$reponse = factory(Reponse::class)->make();

    	$response = $this->postJson( route('api.reponses.store'), $reponse->toArray() );

    	$response
        	->assertStatus(200);

        $this->assertDatabaseHas('reponses', $reponse->toArray() );

    }
}
