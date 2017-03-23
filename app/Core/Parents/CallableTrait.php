<?php

namespace App\Core\Parents;

use Illuminate\Support\Facades\App;

trait CallableTrait {
    /**
     * @param       $class
     * @param array $args
     *
     * @return  mixed
     */
    public function call($class, $args = []) {
        return App::make($class)->run(...$args);
    }

    /**
     * @param $class
     * @return mixed
     */
    public function make($class) {
        return App::make($class);
    }
}