<?php
namespace App\Core\Service\Student\Tasks;

use App\Core\Parents\Action;
use App\Core\Service\Board\Models\Board;
use App\Core\Service\Student\Models\Student;
use App\Core\Service\Student\Repositories\StudentRepository;

class FindStudentsByBoardTask extends Action {

    /** @var StudentRepository */
    protected $studentRepository;

    function __construct(StudentRepository $studentRepository) {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @param Board $board
     * @return mixed
     */
    public function run(Board $board) {
        return Student::with(['board', 'grades'])->where('id_board', $board->id)->get();
    }
}