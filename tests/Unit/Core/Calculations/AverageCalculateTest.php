<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Calculations\AverageCalculate;
use Tests\TestCase;

class AverageCalculateTest extends TestCase {

    public function testAverageCalculation() {
        $grades = [6, 9, 9];
        $averageCalculation = new AverageCalculate($grades);

        $this->assertEquals($averageCalculation->calculate(), 8);
    }
}