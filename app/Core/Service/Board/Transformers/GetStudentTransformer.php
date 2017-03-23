<?php
namespace App\Core\Service\Board\Transformers;

use App\Core\Parents\AbstractTransformer;
use App\Core\Service\Student\Models\Student;
use App\Core\Service\Student\Transformers\ListGradesTransformer;

class GetStudentTransformer extends AbstractTransformer {

    /** @var  Student */
    protected $student;

    public function __construct(Student $student) {
        $this->student = $student;
    }

    function transform() {
        return [
            'id' => $this->student->id,
            'first_name' => $this->student->first_name,
            'last_name' => $this->student->last_name,
            'grades' => (new ListGradesTransformer($this->student->grades))->transform(),
            'average' => $this->student->average,
            'final_result' => $this->_resolveFinalResult($this->student->pass),
        ];
    }

    private function _resolveFinalResult($pass) {
        $finalResult = 'Fail';

        if($pass) {
            $finalResult = 'Pass';
        }

        return $finalResult;
    }
}