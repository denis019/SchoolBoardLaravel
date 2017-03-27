<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Service\Board\Tasks\FindBoardByNameTask;
use App\Core\Service\Board\Tasks\ListStudentsAverageGradesTask;
use App\Core\Service\Student\Models\Student;
use Tests\TestCaseDB;

class ListStudentsAverageGradesTaskTest extends TestCaseDB {

    protected $students = null;

    public function testNotNullStudents() {

        $students = $this->_findStudents();

        $this->assertNotNull($students);
    }

    public function testStudentsAverage() {
        $students = $this->_findStudents();

        $student = $students[0]->toArray();

        $this->assertTrue(key_exists('average', $student));
    }

    public function testStudentsPass() {
        $students = $this->_findStudents();

        $student = $students[0]->toArray();

        $this->assertTrue(key_exists('pass', $student));
    }

    public function testStudentsHasBoard() {
        $students = $this->_findStudents();

        $student = $students[0]->toArray();

        $this->assertTrue(key_exists('board', $student));
    }

    public function testStudentsHasGrades() {
        $students = $this->_findStudents();

        $student = $students[0]->toArray();

        $this->assertTrue(key_exists('grades', $student));
    }

    /**
     * @return Student[]|null
     */
    private function _findStudents() {
        if(!is_null($this->students)) {
            return $this->students;
        }

        /** @var FindBoardByNameTask $findBoardByNameTask */
        $findBoardByNameTask = $this->app->make(FindBoardByNameTask::class);

        $board = $findBoardByNameTask->run('CSMB');

        /** @var ListStudentsAverageGradesTask $listStudentsAverageGradesTask */
        $listStudentsAverageGradesTask = $this->app->make(ListStudentsAverageGradesTask::class);

        $students = $listStudentsAverageGradesTask->run($board);

        $this->students = $students;

        return $this->students;
    }
}