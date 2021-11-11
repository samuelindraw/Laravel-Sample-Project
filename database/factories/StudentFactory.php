<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\student;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\App;

$factory->define(App\student::class, function (Faker $faker) {
    return [
        'nik' => mt_rand(8),
        'name' => $faker->name,
        'address' => $faker->address,
    ];
});
