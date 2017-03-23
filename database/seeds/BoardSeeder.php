<?php

use App\Core\Service\Board\Models\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Board::class, 'BoardCSM', 1)->create();
        factory(Board::class, 'BoardCSMB', 1)->create();
    }
}
