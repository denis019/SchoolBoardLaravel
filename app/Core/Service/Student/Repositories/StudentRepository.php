<?php
namespace App\Core\Service\Student\Repositories;

use App\Core\Parents\AbstractRepository;
use App\Core\Service\Student\Models\Student;

class StudentRepository extends AbstractRepository {
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model() {
        return Student::class;
    }
}