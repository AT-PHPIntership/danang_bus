<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->userName(),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'fullname' => $faker->firstName().' '.$faker->lastName(),
    ];
});

$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text($maxNbChars = 70),
        'content' => $faker->paragraph($nbSentences = 12, $variableNbSentences = true),
        'picture_path' => $faker->imageUrl($width = 340, $height = 250),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text($maxNbChars = 70),
    ];
});

$factory->define(App\Models\Route::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'type' => $faker->biasedNumberBetween($min = 1, $max = 2),
        'distance'   => $faker->biasedNumberBetween($min = 10, $max = 50),
        'frequency'   => $faker->biasedNumberBetween($min = 5, $max = 8),
        'frequency_peak'   => $faker->biasedNumberBetween($min = 7, $max = 10),
        'start_time'   => $faker->time($format = 'H:i:s'),
        'end_time'=> $faker->time($format = 'H:i:s'),
    ];
});

$factory->define(App\Models\FeedBacks::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->userName().'@gmail.com',
        'content' => $faker->sentence($nbWords = 13, $variableNbWords = true),
        'reply'   => $faker->sentence($nbWords = 15, $variableNbWords = true),
    ];
});

$factory->define(App\Models\Stop::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'lat' => $faker->latitude($min = 0, $max = 180) ,
        'lng'   => $faker->longitude($min = 0, $max = 180),
        'address'   => $faker->streetName,
    ];
});

$factory->define(App\Models\Directions::class, function (Faker\Generator $faker) {
    return [
        'order' => $faker->biasedNumberBetween($min = 1, $max = 10),
        'fee' => $faker->NumberBetween($min = 5000, $max = 50000),
        'status' => $faker->biasedNumberBetween($min = 0, $max = 1),
        'time' => $faker->time($format = 'H:i:s'),
    ];
});