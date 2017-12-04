<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Vendors::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'users_id' => User::orderByRaw("RAND()")->first()->id,
        'logo' => str_replace('storage/app/public/','',$faker->image('storage/app/public/vendors/')),        
    ];
});
