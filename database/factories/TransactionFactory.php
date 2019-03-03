<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
              'tra_estado'=> 'Ok',
              'tra_valor' => mt_rand(100,300),
              'usr_id' => mt_rand(1,20),
              'ttr_id' => mt_rand(1,2)
    ];
});
