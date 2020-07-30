<?php

use Faker\Generator as Faker;

$factory->define(App\student_master::class, function (Faker $faker) {
    $division=['a','b','c'];
    $gender=['female','male'];
    return [
        //
        'class'=>$faker->numberBetween(1,9),
        'division'=>$division[\rand(0,2)],
        'roll_no'=>rand(1,60),
        'student_name'=>$faker->name,
        'birth_date'=>$faker->date('Y-m-d','now'),
        'gender'=>$gender[\rand(0,1)],
        'student_contact'=>$faker->phoneNumber,
        'student_join_date'=>$faker->date('Y-m-d','now'),
        'parents_name'=>$faker->name,
        'parents_occupation'=>$faker->jobTitle,
        'parents_contact'=>$faker->phoneNumber,
        'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'address'=>$faker->address,
        'status'=>1
    ];
});
