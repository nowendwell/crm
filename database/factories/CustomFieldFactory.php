<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\CustomField;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


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

$factory->define(CustomField::class, function (Faker $faker) {
    $types = [
        'integer',
        'string',
        'relationship'
    ];

    $parent_types = [
        'App\Account',
        'App\Contact',
    ];

    return [
        'uuid' => $faker->uuid(),
        'display_name' => Str::snake($faker->words(2, true)),
        'type' => $types[random_int(0,2)],
        'organization_id' => random_int(1, 10),
        'parent_object_type' => $parent_types[rand(0,1)],
    ];
});
