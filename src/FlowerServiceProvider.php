<?php 
namespace Joesama\Flower;

use Illuminate\Routing\Router;
use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;
use Orchestra\Extension\Factory;
use Joesama\Flower\Handlers\Menu\FlowerMenuHandler;

/**
 * Wrapper extension for threef development
 *
 * @package Threef\Entree
 * @author joharijumali@gmail.com
 **/
class FlowerServiceProvider extends ModuleServiceProvider
{

    /**
     * The application or extension group namespace.
     *
     * @var string|null
     */
    protected $routeGroup = '';

    /**
     * The fallback route prefix.
     *
     * @var string
     */
    protected $routePrefix = '';


    /**
     * The application or extension namespace.
     *
     * @var string|null
     */
    protected $namespace = 'Joesama\Flower\Http\Routing';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = FALSE;

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];

    /**
     * The application's or extension's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        
    ];

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
 
    }


    /**
     * Booting Entree Views, Language, Configuration
     **/
    protected function bootExtensionComponents()
    {
        $path = realpath(__DIR__.'/../resources');

        $this->addLanguageComponent('joesama/flower', 'joesama/flower', $path.'/lang');
        $this->addConfigComponent('joesama/flower', 'joesama/flower', $path.'/config');
        $this->addViewComponent('joesama/flower', 'joesama/flower', $path.'/views');

        $this->registerMenu();

    }


    /**
     * Register packages menu
     *
     **/
    protected function registerMenu()
    {
        $events = $this->app->make('events');
        $config = $this->app->make('config');
        $acl = $this->app->make('orchestra.acl')->make('orchestra');
        $actions = ['Manage Flower'];

        $admin   = $config->get('orchestra/foundation::roles.admin', 1);
        $roles   = $this->app->make('orchestra.role')->newQuery()->pluck('name', 'id');

        $acl->actions()->attach($actions);
        $acl->allow($roles[$admin], $actions);

        $handlers = [
            FlowerMenuHandler::class
        ];

        foreach ($handlers as $handler) {
            $events->listen('orchestra.started: admin', $handler);
        }

    }

    /**
     * Boot extension routing.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $path = realpath(__DIR__);

        $this->loadBackendRoutesFrom($path.'/routes.php');
    }


} // END class Entree 