<?php
namespace App\Core\Calculations;

class AverageCalculate {

    /** @var  array */
    protected $grades;

    public function __construct(array $grades) {
        $this->grades = $grades;
    }

    public function calculate() {
        $average = 0;

        if(count($this->grades) > 0) {
            $average = array_sum($this->grades) / count($this->grades);
        }

        return $average;
    }
}