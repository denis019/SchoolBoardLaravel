<?php
namespace App\Core\Service\Board\Tasks;

use App\Core\Parents\Action;
use App\Core\Service\Board\Models\Board;
use App\Core\Service\Student\Models\Student;
use App\Core\Service\Student\Tasks\FindStudentsByBoard;
use App\Core\Service\Student\Tasks\ListStudentAverageGradesTask;

class ListStudentsAverageGradesTask extends Action {

    /**
     * @param Board $board
     * @return mixed
     */
    public function run(Board $board) {

        /** @var Student[] $students */
        $students = $this->call(FindStudentsByBoard::class, [$board]);

        foreach ($students as $student) {
            $this->call(ListStudentAverageGradesTask::class, [$student]);
        }

        return $students;
    }
}