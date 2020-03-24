<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categories;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'description'   => $faker->paragraph,
        'slug'          => $faker->slug,
        'created_at'    => $faker->dateTime()->format('Y-m-d H:i:s'),
        'updated_at'    => $faker->dateTime()->format('Y-m-d H:i:s')
    ];
});
