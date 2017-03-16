<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->seedPresencesTable();
    	#$this->seedFamillesTable();
    	#$this->seedReponsesTable();
    }

    private function seedPresencesTable()
    {
    	DB::table('presences')->insert(['presence' => 'cocktail & repas']);
        DB::table('presences')->insert(['presence' => 'seulement cocktail']);
        DB::table('presences')->insert(['presence' => 'non présent']);
    }

    private function seedFamillesTable()
    {
    	factory(App\Famille::class,60)->create();
    }

    private function seedReponsesTable()
    {
    	DB::table('reponses')->truncate();
    	factory(App\Reponse::class,50)->create();
    }
}
