<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Articles;
use Faker\Generator as Faker;

$factory->define(Articles::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence,
        'subtitle'      => $faker->sentence,
        'description'   => $faker->paragraph,
        'slug'          => $faker->slug,
        'created_at'    => $faker->dateTime()->format('Y-m-d H:i:s'),
        'updated_at'    => $faker->dateTime()->format('Y-m-d H:i:s')
    ];
});
