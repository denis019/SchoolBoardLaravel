<?php
namespace App\Core\Rules;

use App\Core\Calculations\AverageCalculate;

class PassRule extends AbstractRule {

    public function execute() {
        $average = (new AverageCalculate($this->grades))->calculate();

        if($average) {
            $this->passed = $average >= $this->getPassLimit();
            $this->average = $average;
        }
    }
}