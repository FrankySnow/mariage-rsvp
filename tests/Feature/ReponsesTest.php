<?php

namespace Tests\Feature;

use App\User;
use App\Reponse;
use App\Presence;
use Tests\TestCase;
use App\Notifications\NouvelleReponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReponsesTest extends TestCase
{
	use DatabaseTransactions;

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

        $response = $this->getJson( route('api.reponses.show', $reponse) );

        $response
        	->assertStatus(200)
        	->assertJson([ 'data' => $reponse->toArray() ]);
    }

    /** @test */
    public function on_ne_peut_pas_obtenir_une_réponse_qui_n_existe_pas()
    {
    	$reponse = factory(Reponse::class)->create();

        $response = $this->getJson( route('api.reponses.show', $reponse->id + 1) );

        $response
        	->assertStatus(404)
        	->assertJsonFragment([ 'erreur' ]);
    }

    /** @test */
    public function on_peut_ajouter_une_réponse()
    {
        Notification::fake();

        $presence = Presence::create(['presence' => $this->faker->sentence]);
    	$reponse =  factory(Reponse::class)->make([
            'presence_id' => $presence->id,
        ]);
        $users = factory(User::class,2)->create();
        
    	$response = $this->postJson( 
            route('api.reponses.store'), 
            $reponse->toArray() + [
                'prenom_conjoint' => $this->faker->firstName,
                'nom_conjoint' => $this->faker->lastName,
                'conjoint' => true
            ] 
        );

    	$response
        	->assertStatus(200);

        $this->assertDatabaseHas('reponses', $reponse->toArray() );

        Notification::assertSentTo(
            $users,
            NouvelleReponse::class
        );
    }
}
