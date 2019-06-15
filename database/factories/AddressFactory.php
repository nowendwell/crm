<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Address;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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

$factory->define(Address::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid(),
        'street_number' => $faker->buildingNumber(),
        'street' => $faker->streetName(),
        'city' => $faker->city(),
        'state' => $faker->state(),
        'zip' => $faker->postcode(),
        'country' => $faker->country()
    ];
});
