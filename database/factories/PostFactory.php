<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
//    var_dump()
    return [
        //
        'title' => $faker->sentence(mt_rand(3,10)),
        'content' => join("",$faker->paragraphs(mt_rand(3,6))),
//        'publish_at' => strtotime($faker->dateTimeBetween('-1 month','+3 days'))
        'publish_at' => mt_rand(strtotime('-1 month'),strtotime('+3 days'))
    ];
});
