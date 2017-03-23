<?php
namespace App\Core\Rules;

abstract class AbstractRule {
    protected $grades;

    protected $config;

    protected $average = 0;

    protected $passed = false;

    public function __construct($grades, $config) {
        $this->grades = $grades;
        $this->config = $config;

        $this->execute();
    }

    public function getPassLimit() {
        return $this->config['pass_limit'];
    }

    public function getLowestLimit() {
        return $this->config['remove_lowest_limit'];
    }

    abstract function execute();

    /**
     * @return int
     */
    public function getAverage() {
        return $this->average;
    }

    /**
     * @param int $average
     */
    public function setAverage($average) {
        $this->average = $average;
    }

    /**
     * @return mixed
     */
    public function getGrades() {
        return $this->grades;
    }

    /**
     * @param mixed $grades
     */
    public function setGrades($grades) {
        $this->grades = $grades;
    }

    /**
     * @return bool
     */
    public function isPassed() {
        return $this->passed;
    }

    /**
     * @param bool $passed
     */
    public function setPassed($passed) {
        $this->passed = $passed;
    }
}