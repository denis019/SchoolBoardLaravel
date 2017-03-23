<?php
namespace App\Http\Controllers;

use App\Core\Service\Board\Actions\ActionsTrait;
use App\Core\Service\Board\Transformers\ListStudentTransformer;
use App\Http\Response\ResponseTrait;

class BoardController extends Controller {
    use ResponseTrait, ActionsTrait;

    public function listStudents($boardName) {
        $board = $this->getBoardAction()->run($boardName);

        $students = $this->getListStudentsAction()->run($board);

        $transformedData =  (new ListStudentTransformer($students))->transform();

        return $this->successResponse($transformedData, $board->response_format);
    }
}