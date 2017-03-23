<?php

use App\Core\Service\Board\Models\Board;

$factory->defineAs(Board::class, 'BoardCSM', function (Faker\Generator $faker) {
    return array(
        'name' => 'CSM',
        'response_format' => 'json',
    );
});

$factory->defineAs(Board::class, 'BoardCSMB', function (Faker\Generator $faker) {
    return array(
        'name' => 'CSMB',
        'response_format' => 'xml',
    );
});