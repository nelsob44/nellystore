<?php

use Faker\Generator as Faker;
use App\Model\Product;

$factory->define(App\Model\Payment::class, function (Faker $faker) {
    return [
        'user_email' => App\User::all()->random()->email,
        'product_name' => $faker->word,
        'product_id' => function(){
            return Product::all()->random();
        },
        'price' => $faker->randomFloat(2, 1, 500),
    ];
});
