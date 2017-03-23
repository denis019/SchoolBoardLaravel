<?php
namespace App\Core\Rules;

class RemoveLowestRule extends AbstractRule {

    public function execute() {
        if(count($this->grades) > $this->getLowestLimit()) {
            $this->_removeLowest($this->grades);
        }
    }

    private function _removeLowest(&$grades) {
        sort($grades, SORT_NUMERIC);
        array_shift($grades);
    }
}