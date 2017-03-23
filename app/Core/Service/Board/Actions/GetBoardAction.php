<?php
namespace App\Core\Service\Board\Actions;

use App\Core\Parents\Action;
use App\Core\Service\Board\Models\Board;
use App\Core\Service\Board\Tasks\FindBoardByNameTask;

class GetBoardAction extends Action {

    /**
     * @param $boardName
     * @return Board|null
     */
    public function run($boardName) {
        return $this->call(FindBoardByNameTask::class, [$boardName]);
    }
}