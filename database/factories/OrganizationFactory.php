<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Organization;
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

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid(),
        'name' => $faker->company(),
        'deleted_at' => null
    ];
});
