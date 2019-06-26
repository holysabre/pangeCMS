<?php

use Faker\Generator as Faker;
use App\Models\Menu;
use Carbon\Carbon;

$factory->define(Menu::class, function (Faker $faker) {
    $date = Carbon::now();
    return [
        'created_at' => $date,
        'updated_at' => $date
    ];
});
