<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Rules\RemoveLowestRule;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class RemoveLowestRuleTest extends TestCase {

    public function setUp() {
        parent::setUp();

        Config::set('boardrules',
            ['remove_lowest_limit' => 2]
        );
    }

    public function testRemoveLowestRule() {
        $grades = [6, 9, 9];
        $lowestRule = new RemoveLowestRule($grades, Config::get('boardrules'));

        $this->assertEquals(count($lowestRule->getGrades()), 2);
    }

    public function testRemoveLowestLimitRule() {
        $grades = [5, 9];
        $lowestRule = new RemoveLowestRule($grades, Config::get('boardrules'));

        $this->assertEquals(count($lowestRule->getGrades()), 2);
    }

    public function testRemoveLowestRuleNoGrades() {
        $grades = [];
        $lowestRule = new RemoveLowestRule($grades, Config::get('boardrules'));

        $this->assertEquals(count($lowestRule->getGrades()), 0);
    }
}