<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => $password ?: $password = bcrypt('secret'),
        'remember_token'    => str_random(10),
    ];
});

$factory->define(App\Reponse::class, function(Faker\Generator $faker){
	return [
        'prenom'        	=> $faker->firstName,
        'nom'           	=> $faker->lastName,
        'remarque'      	=> $faker->sentence,
        'email'         	=> $faker->email,
        'presence_id'   	=> null,
        'famille_id'    	=> null,
	];
});

$factory->define(App\Famille::class, function(Faker\Generator $faker){
	return [
        'nom'           => $faker->name,
        'adresse'       => $faker->streetAddress,
        'cp'   			=> $faker->postcode,
        'ville'      	=> $faker->city,
        'pays'			=> $faker->country,
	];
});