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

$factory->define(App\Category::class, function (Faker $faker) {
	$name = $faker->word;
    return [
        'name' => $faker->name,
        'slug' => $faker->name
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    $sentence = $faker->sentence;
    return [
        'title' => $sentence,
        'slug' => $sentence,
        'body' => $faker->paragraph. $faker->paragraph.$faker->paragraph.$faker->paragraph. $faker->paragraph.$faker->paragraph,
        'category_id' => function(){return \App\Category::all()->random();},
        'user_id' => function(){return \App\User::all()->random();}
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'user',
        'email' => 'user@user.com',
        'email_verified_at' => now(),
        'password' => bcrypt('useruser'),
        'admin' => true,
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Setting::class, function (Faker $faker) {
    return [
        'site_name' => 'Engr.',
        'contact_number' => '01007569739',
        'contact_email' => 'abdulrahmanfaid11@gmail.com',
        'address' => 'Egypt, Cairo', // secret,
        'about' => $faker->paragraph
    ];
});
