<?php
namespace App\Core\Service\Board\Actions;

use App\Core\Parents\Action;
use App\Core\Service\Board\Models\Board;
use App\Core\Service\Board\Tasks\ListStudentsAverageGradesTask;

class ListStudentsAction extends Action {

    public function run(Board $board) {

        $students = $this->call(ListStudentsAverageGradesTask::class, [$board]);

        return $students;
    }
}