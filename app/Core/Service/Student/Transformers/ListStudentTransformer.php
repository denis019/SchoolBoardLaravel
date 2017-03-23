<?php
namespace App\Core\Service\Student\Transformers;

use App\Core\Parents\AbstractTransformer;

class ListStudentTransformer extends AbstractTransformer {
    protected $students;

    public function __construct($students) {
        $this->students = $students;
    }

    function transform() {
        $response = [];

        foreach ($this->students as $student) {
            $response[] = (new GetStudentTransformer($student))->transform();
        }

        return $response;
    }
}