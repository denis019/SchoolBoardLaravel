<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Service\Board\Tasks\FindBoardByNameTask;
use Tests\TestCaseDB;

class FindBoardByNameTaskTest extends TestCaseDB {

    public function testFindBoardByNameTask() {
        /** @var FindBoardByNameTask $findBoardByNameTask */
        $findBoardByNameTask = $this->app->make(FindBoardByNameTask::class);

        $board = $findBoardByNameTask->run('CSMB');

        $this->assertNotNull($board);
    }
}