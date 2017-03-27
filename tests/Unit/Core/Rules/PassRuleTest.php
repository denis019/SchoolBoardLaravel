<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Rules\PassRule;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class PassRuleTest extends TestCase {

    public function setUp() {
        parent::setUp();

        Config::set('boardrules',
            ['pass_limit' => 7]
        );
    }

    public function testSuccessPassRule() {
        $grades = [6, 9, 9];
        $passRule = new PassRule($grades, Config::get('boardrules'));

        $this->assertTrue($passRule->isPassed());
    }

    public function testFailPassRule() {
        $grades = [6, 6, 6];
        $passRule = new PassRule($grades, $config = Config::get('boardrules'));

        $this->assertFalse($passRule->isPassed());
    }

    public function testPassRuleNoGrades() {
        $grades = [];
        $passRule = new PassRule($grades, Config::get('boardrules'));

        $this->assertFalse($passRule->isPassed());
    }
}