<?php namespace Threef\Extension\Handlers\Events;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MenuHandlers
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle User Insertion Event
     *
     * @param  entree.menu:ready $menu
     * @return void
     */
    public function handle($menu)
    {
        $menu->add('extension','>:home')
            ->title('Extension Menu')
            ->link('#')
            ->icon('fa fa-american-sign-language-interpreting');

    }



}
