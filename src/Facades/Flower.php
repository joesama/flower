<?php
namespace Joesama\Flower\Facades;

use Illuminate\Support\Facades\Facade;

class Flower extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'flower'; }

}