<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [

        'first_name'=>$faker->firstName,
        'last_name'=> $faker->lastName,
        'birth_date'=>$faker->dateTimeBetween('-20 years' , '-19 years')->format('Y-m-d'),
        'phone_number'=>$faker->phoneNumber,
        'total_grade'=>$faker->numberBetween(450,800)
    ];
});
