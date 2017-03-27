<?php
namespace App\Core\Service\Board\Models;

use App\Core\Service\Student\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Config;

/**
 * App\Core\Service\Board\Models\Board
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Core\Service\Student\Models\Student[] $students
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $response_format
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Board\Models\Board whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Board\Models\Board whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Board\Models\Board whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Board\Models\Board whereResponseFormat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Core\Service\Board\Models\Board whereUpdatedAt($value)
 */
class Board extends Model {
    protected $fillable = array('name', 'response_format');

    /**
     * One to Many relation
     *
     * @return HasMany
     */
    public function students() {
        return $this->hasMany(Student::class, 'id_board');
    }

    public function getBoardNameLowerCase() {
        return strtolower($this->name);
    }

    public function getBoardConfig() {
        $rules = Config::get('boardrules');

        return $rules[$this->getBoardNameLowerCase()];
    }
}