<?php

use App\Core\Service\Student\Models\Grade;
use App\Core\Service\Student\Models\Student;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();

        /** @var Student $student */
        foreach($students as $student) {
            $randNumbOfGrades = rand (1, 4);

            for($i=0; $i<$randNumbOfGrades; $i++) {
                $grade = new Grade();
                $grade->value = rand (1, 10);
                $grade->student()->associate($student);
                $grade->save();
            }
        }
    }
}
