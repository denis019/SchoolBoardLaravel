<?php
namespace App\Core\Service\Student\Actions;

use App\Core\Parents\CallableTrait;

trait ActionsTrait {
    use CallableTrait;

    /**
     * @return GetStudentAction
     */
    public function getStudentAction() {
        return $this->make(GetStudentAction::class);
    }
}