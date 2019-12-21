<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Listing;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'list_name' => $faker->name,
        'address' => $faker->address,
        'latitude' => $this->faker->latitude,
        'longitude' => $this->faker->longitude,
        'submitter_id' => $this->faker->randomDigitNotNull,
    ];
});
