<?php
namespace App\Core\Rules;

class RuleContext extends AbstractRule {

    /** @var AbstractRule[] */
    protected $rules = [];

    public function execute() {
        foreach ($this->config as $class => $value) {

            switch ($class) {
                case "pass_limit":
                    $rule = new PassRule($this->grades, $this->config);
                    break;
                case "remove_lowest_limit":
                    $rule = new RemoveLowestRule($this->grades, $this->config);
                    break;
            }

            $this->setPassed($rule->isPassed());
            $this->setAverage($rule->getAverage());
            $this->setGrades($rule->getGrades());
        }
    }
}