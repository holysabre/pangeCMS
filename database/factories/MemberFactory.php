<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Member::class, function (Faker $faker) {
    $date_time = $faker->date() . ' ' . $faker->time();
    return [
        'name' => $faker->name,
        'phone' => gen_rand_number(11),
        'card_image_front' => $faker->imageUrl,
        'card_image_back' => $faker->imageUrl,
        'status' => 'active',
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
