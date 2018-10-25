<?php

use Faker\Generator as Faker;
use App\Model\Category;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'user_id' => App\User::all()->random()->id,
        'name' => $name,
       
        'category_id' => function(){
            return Category::all()->random();
        },
        'price' => $faker->randomFloat(2, 1, 500),
        'description' => $faker->paragraph(random_int(1, 10)),

    ];
});
