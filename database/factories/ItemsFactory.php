<?php

use Faker\Generator as Faker;
use App\Vendors;
use App\Types;
use App\User;

$factory->define(App\Items::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'users_id'=> User::orderByRaw("RAND()")->first()->id,
        'types_id' => Types::orderByRaw("RAND()")->first()->id,
        'vendors_id' => Vendors::orderByRaw("RAND()")->first()->id,
        'sku' => str_random(10),
        'price' => $faker->randomNumber(2),
        'color' => $faker->safeColorName,
        'color' => $faker->safeColorName,
        'release_date' => $faker->date,
        'photo' => str_replace('storage/app/public/','',$faker->image('storage/app/public/items/')), 
    ];
});
