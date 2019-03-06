<?php
namespace Joesama\Flower\Handlers\Menu;

use Orchestra\Foundation\Support\MenuHandler;

class FlowerMenuHandler extends MenuHandler
{
    /**
     * Menu configuration.
     *
     * @var array
     */
    protected $menu = [
        'id'    => 'flower',
        'title' => 'Simple Decision Maker',
        'link'  => '#!',
        'icon'  => 'link',
        'with'  => [
            MapperMenuHandler::class,
            // AclMenuHandler::class,
            // ThemeMenuHandler::class,
        ],
    ];


    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    protected function title()
    {
        echo Lang::get('joesama/flower::menu.flower');
    }    

    /**
     * Get position.
     *
     * @return string
     */
    public function getPositionAttribute()
    {
        return $this->handler->has('extensions') ? '>:extensions' : '>:home';
    }

    /**
     * Determine if the request passes the authorization check.
     *
     * @return bool
     */
    protected function passesAuthorization(): bool
    {
        return $this->hasNestedMenu();
    }
}
