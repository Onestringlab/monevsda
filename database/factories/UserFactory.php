<?php

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

$factory->define(App\Username::class, function (Faker $faker) {
    static $password;

    return [
        'username' => $faker->username,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'Admin',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});
