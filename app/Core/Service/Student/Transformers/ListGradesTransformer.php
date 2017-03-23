<?php
namespace App\Core\Service\Student\Transformers;

use App\Core\Parents\AbstractTransformer;
use App\Core\Service\Student\Models\Grade;

class ListGradesTransformer extends AbstractTransformer {

    /** @var  Grade[] */
    protected $grades;

    public function __construct($grades) {
        $this->grades = $grades;
    }

    function transform() {
        $response = [];

        foreach ($this->grades as $grade) {
            $response[] = (new GetGradeTransformer($grade))->transform();
        }

        return $response;
    }
}