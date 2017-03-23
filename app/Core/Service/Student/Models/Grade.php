<?php
namespace App\Core\Service\Student\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Core\Service\Student\Models\Grade
 *
 * @property-read \App\Core\Service\Student\Models\Student $student
 * @mixin \Eloquent
 * @property int $id
 * @property int $id_student
 * @property int $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Grade whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Grade whereIdStudent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Grade whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Grade whereValue($value)
 */
class Grade extends Model {
    protected $fillable = array('value');

    /**
     * @return BelongsTo
     */
    public function student() {
        return $this->belongsTo(Student::class, 'id_student');
    }
}