<?php

use App\Core\Service\Board\Models\Board;
use App\Core\Service\Student\Models\Student;

$factory->defineAs(Student::class, 'StudentCSM', function (Faker\Generator $faker) {
    return array(
        'id_board' => Board::where(array(
            'name' => 'CSM'
        ))->first()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    );
});

$factory->defineAs(Student::class, 'StudentCSMB', function (Faker\Generator $faker) {
    return [
        'id_board' => Board::where([
            'name' => 'CSMB'
        ])->first()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});