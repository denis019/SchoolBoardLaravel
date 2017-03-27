<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Service\Board\Models\Board;
use App\Core\Service\Board\Tasks\FindBoardByNameTask;
use App\Core\Service\Student\Tasks\FindStudentByIdTask;
use App\Core\Service\Student\Tasks\FindStudentsByBoardTask;
use Tests\TestCaseDB;

class FindStudentsByBoardTaskTest extends TestCaseDB {

    /** @var  Board */
    private $board;

    public function testFindStudentsByBoard() {

        $board = $this->_findBoard();

        /** @var FindStudentsByBoardTask $findStudentByBoardTask */
        $findStudentByBoardTask = $this->app->make(FindStudentsByBoardTask::class);

        $student = $findStudentByBoardTask->run($board);

        $this->assertNotNull($student);
    }

    public function testStudentsRelations() {

        $board = $this->_findBoard();

        /** @var FindStudentsByBoardTask $findStudentByBoardTask */
        $findStudentByBoardTask = $this->app->make(FindStudentsByBoardTask::class);

        $student = $findStudentByBoardTask->run($board)->toArray()[0];

        $pass = false;

        if(key_exists('board', $student) && key_exists('grades', $student)) {
            $pass = true;
        }

        $this->assertTrue($pass);
    }

    private function _findBoard() {
        if(!is_null($this->board)) {
            return $this->board;
        }

        /** @var FindBoardByNameTask $findBoardByNameTask */
        $findBoardByNameTask = $this->app->make(FindBoardByNameTask::class);

        $this->board = $findBoardByNameTask->run('CSMB');
        return $this->board;
    }
}