<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'=>factory(User::class), //relates user id field with user class
        'title' =>$faker->sentence(),
        'post_image' => $faker->imageUrl('900','300'),
        'body' => $faker->paragraph()

    ];
});
