<?php
namespace Tests\Unit\Core\Rules;

use App\Core\Rules\PassRule;
use App\Core\Rules\RemoveLowestRule;
use App\Core\Rules\RuleContext;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class RuleContextTest extends TestCase {

    public function setUp() {
        parent::setUp();

        Config::set('boardrules',
            [
                'csmb' => [
                    'remove_lowest_limit' => 2,
                    'pass_limit' => 7,
                ],

                'csm' => [
                    'pass_limit' => 7,
                ],
            ]
        );
    }

    public function testCsmbContextPassRuleSuccess() {
        $grades = [1, 7, 7];
        $ruleContext = new RuleContext($grades, Config::get('boardrules')['csmb']);

        $this->assertTrue($ruleContext->isPassed());
    }

    public function testCsmbContextPassRuleFail() {
        $grades = [1, 6, 7];
        $ruleContext = new RuleContext($grades, Config::get('boardrules')['csmb']);

        $this->assertFalse($ruleContext->isPassed());
    }

    public function testCsmbContextRemoveLowestGrade() {
        $grades = [1, 6, 7];
        $ruleContext = new RuleContext($grades, Config::get('boardrules')['csmb']);

        $this->assertEquals(count($ruleContext->getGrades()), 2);
    }

    public function testCsmContextPassRuleSuccess() {
        $grades = [8, 7, 7];
        $ruleContext = new RuleContext($grades, Config::get('boardrules')['csm']);

        $this->assertTrue($ruleContext->isPassed());
    }

    public function testCsmContextPassRuleFail() {
        $grades = [1, 7, 7];
        $ruleContext = new RuleContext($grades, Config::get('boardrules')['csm']);

        $this->assertFalse($ruleContext->isPassed());
    }
}