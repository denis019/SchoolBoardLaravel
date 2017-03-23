<?php
namespace App\Core\Service\Student\Tasks;

use App\Core\Parents\Action;
use App\Core\Service\Student\Repositories\StudentRepository;

class FindStudentByIdTask extends Action {

    /** @var StudentRepository */
    protected $studentRepository;

    function __construct(StudentRepository $studentRepository) {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function run($id) {
        return $this->studentRepository->findOneWith($id, ['grades', 'board']);
    }
}