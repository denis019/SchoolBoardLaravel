<?php
namespace App\Core\Service\Student\Tasks;

use App\Core\Parents\Action;
use App\Core\Rules\RuleContext;
use App\Core\Service\Student\Exceptions\StudentNotFoundException;
use App\Core\Service\Student\Models\Student;

class ListStudentAverageGradesTask extends Action {

    /**
     * @param Student|int $student
     * @return Student|null
     */
    public function run($student) {

        if(!($student instanceof Student)) {
            /** @var Student $student */
            $student = $this->call(FindStudentByIdTask::class, [$student]);
        }

        if(is_null($student)) {
            return $student;
        }

        $grades = array_pluck($student->grades, 'value');
        $ruleContext = new RuleContext($grades, $student->board->getBoardConfig());

        $average = $ruleContext->getAverage();
        $pass = $ruleContext->isPassed();

        $student->average = $average;
        $student->pass = $pass;

        return $student;
    }
}