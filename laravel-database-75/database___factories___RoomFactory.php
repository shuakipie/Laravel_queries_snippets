<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->text(20)),
        'description' => $faker->sentence(),
        'created_at' => $faker->dateTimeBetween('-10 days', '-5 days'),
        'updated_at' => $faker->dateTimeBetween('-3 days', '-1 hour')
    ];
});

