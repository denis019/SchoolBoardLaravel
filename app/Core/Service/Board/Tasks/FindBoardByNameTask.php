<?php
namespace App\Core\Service\Board\Tasks;

use App\Core\Parents\Action;
use App\Core\Service\Board\Models\Board;
use App\Core\Service\Board\Repositories\BoardRepository;

class FindBoardByNameTask extends Action {

    /** @var BoardRepository */
    protected $boardRepository;

    function __construct(BoardRepository $boardRepository) {
        $this->boardRepository = $boardRepository;
    }

    /**
     * @param $boardName
     * @return Board | null
     */
    public function run($boardName) {
        return $this->boardRepository->findOneBy([
            'name' => $boardName
        ]);
    }
}