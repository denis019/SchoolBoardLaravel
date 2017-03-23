<?php
namespace App\Core\Service\Student\Models;

use App\Core\Service\Board\Models\Board;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Core\Service\Student\Models\Student
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Service\Student\Models\Grade[] $grades
 * @property-read \App\Core\Service\Board\Models\Board $board
 * @mixin \Eloquent
 * @property int $id
 * @property int $id_board
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Student whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Student whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Student whereIdBoard($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Student whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Student\Models\Student whereUpdatedAt($value)
 */
class Student extends Model {
    protected $fillable = array('first_name', 'last_name');

    /**
     * @return HasMany
     */
    public function grades() {
        return $this->hasMany(Grade::class, 'id_student');
    }

    /**
     * @return BelongsTo
     */
    public function board() {
        return $this->belongsTo(Board::class, 'id_board');
    }
}