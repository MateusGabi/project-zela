<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => str_random("30"),
        'stock' => 21,
        'price' => 99.99
    ];
});
