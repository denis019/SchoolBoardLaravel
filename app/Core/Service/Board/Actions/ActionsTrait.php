<?php
namespace App\Core\Service\Board\Actions;

use App\Core\Parents\CallableTrait;

trait ActionsTrait {
    use CallableTrait;

    /**
     * @return ListStudentsAction
     */
    public function getListStudentsAction() {
        return $this->make(ListStudentsAction::class);
    }

    /**
     * @return GetBoardAction
     */
    public function getBoardAction() {
        return $this->make(GetBoardAction::class);
    }
}