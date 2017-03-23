<?php
namespace App\Http\Controllers;

use App\Core\Service\Board\Transformers\GetStudentTransformer;
use App\Core\Service\Student\Actions\ActionsTrait;
use App\Http\Response\ResponseTrait;

class StudentController extends Controller {
    use ResponseTrait, ActionsTrait;

    public function getStudent($id) {
        $student = $this->getStudentAction()->run($id);

        $transformedData = (new GetStudentTransformer($student))->transform();

        return $this->successResponse($transformedData, $student->board->response_format);
    }
}