<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [

        'name'=> $faker->name,
        'usr_apellido' => $faker->Lastname,
        'usr_telefono' => 76876,
        'usr_ciudad' => 'Bogota',
        'usr_numero_documento' => $faker->phoneNumber,
        'email' => $faker->unique->email,
        'password' => bcrypt('123'),
        'tpe_id' => mt_rand(1,2),
        'tdo_id' => mt_rand(1,4),
        'rol_id' => mt_rand(1,2)

    ];

});
