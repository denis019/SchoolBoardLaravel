<?php
namespace App\Http\Controllers;

use App\Core\Service\Board\Actions\ActionsTrait;
use App\Core\Service\Board\Exceptions\BoardNotFoundException;
use App\Core\Service\Student\Transformers\ListStudentTransformer;

class BoardController extends Controller {
    use ActionsTrait;

    public function listStudents($boardName) {
        return $this->_api(function () use ($boardName) {

            $board = $this->getBoardAction()->run($boardName);

            if(is_null($board)) {
                throw new BoardNotFoundException();
            }

            $students = $this->getListStudentsAction()->run($board);

            $transformedData =  (new ListStudentTransformer($students))->transform();
            $this->format = $board->response_format;

            return $transformedData;
        });
    }
}