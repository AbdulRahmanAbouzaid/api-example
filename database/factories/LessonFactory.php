<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        
        'title' => $faker->word(5),

        'body' => $faker->sentence,

        'user_id' => $faker->numberBetween($min = 1, $max= 3)
        
    ];
});
