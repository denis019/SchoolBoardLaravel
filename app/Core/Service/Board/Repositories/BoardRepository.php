<?php
namespace App\Core\Service\Board\Repositories;

use App\Core\Parents\AbstractRepository;
use App\Core\Service\Board\Models\Board;

class BoardRepository extends AbstractRepository {
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model() {
        return Board::class;
    }
}