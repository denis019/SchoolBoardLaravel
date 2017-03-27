<?php
namespace App\Core\Service\Student\Actions;

use App\Core\Parents\Action;
use App\Core\Service\Student\Models\Student;
use App\Core\Service\Student\Tasks\ListStudentAverageGradesTask;

class GetStudentAction extends Action {

    /**
     * @param $id
     * @return Student|null
     */
    public function run($id) {

        $student = $this->call(ListStudentAverageGradesTask::class, [$id]);

        return $student;
    }
}