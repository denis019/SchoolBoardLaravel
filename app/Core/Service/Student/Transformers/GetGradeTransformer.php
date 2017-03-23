<?php
namespace App\Core\Service\Student\Transformers;

use App\Core\Parents\AbstractTransformer;
use App\Core\Service\Student\Models\Grade;

class GetGradeTransformer extends AbstractTransformer {

    /** @var  Grade */
    protected $grade;

    public function __construct($grade) {
        $this->grade = $grade;
    }

    function transform() {
        return [
            'value' => $this->grade->value
        ];
    }
}