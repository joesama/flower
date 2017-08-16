<?php
namespace Joesama\Flower\Handlers\Menu;

use Orchestra\Foundation\Support\MenuHandler;
use Orchestra\Contracts\Authorization\Authorization;

class MapperMenuHandler extends MenuHandler
{
    /**
     * Menu configuration.
     *
     * @var array
     */
    protected $menu = [
        'id'    => 'flower-mapper',
        'title' => 'Registered Process',
        'link'  => 'joesama/flower::admin/flower/registered',
        'icon'  => '',
    ];

    /**
     * Check whether the menu should be displayed.
     *
     * @param  \Orchestra\Contracts\Authorization\Authorization  $acl
     *
     * @return bool
     */
    public function authorize(Authorization $acl)
    {
        return $acl->canIf('manage flower');
    }
}
