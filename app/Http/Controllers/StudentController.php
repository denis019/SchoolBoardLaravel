<?php
namespace App\Http\Controllers;

use App\Core\Service\Student\Actions\ActionsTrait;
use App\Core\Service\Student\Exceptions\StudentNotFoundException;
use App\Core\Service\Student\Transformers\GetStudentTransformer;
use App\Http\Response\ResponseTrait;

class StudentController extends Controller {
    use ActionsTrait;

    public function getStudent($id) {
        return $this->_api(function () use ($id) {

            $student = $this->getStudentAction()->run($id);

            if(is_null($student)) {
                throw new StudentNotFoundException();
            }

            $this->format = $student->board->response_format;
            return (new GetStudentTransformer($student))->transform();
        });
    }
}