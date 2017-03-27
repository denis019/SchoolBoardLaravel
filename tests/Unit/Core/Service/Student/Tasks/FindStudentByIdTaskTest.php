<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Service\Student\Tasks\FindStudentByIdTask;
use Tests\TestCaseDB;

class FindStudentByIdTaskTest extends TestCaseDB {

    public function testFindStudentById() {
        /** @var FindStudentByIdTask $findBoardByNameTask */
        $findStudentByIdTask = $this->app->make(FindStudentByIdTask::class);

        $student = $findStudentByIdTask->run(1);

        $this->assertNotNull($student);
    }
}