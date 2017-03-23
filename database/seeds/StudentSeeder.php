<?php

use App\Core\Service\Student\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Student::class, 'StudentCSM', 50)->create();
        factory(Student::class, 'StudentCSMB', 50)->create();
    }
}
