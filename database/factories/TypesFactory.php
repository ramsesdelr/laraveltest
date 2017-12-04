<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Types::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'users_id' => User::orderByRaw("RAND()")->first()->id,
    ];
});
