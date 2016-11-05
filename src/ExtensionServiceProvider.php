<?php namespace Threef\Extension;

use Illuminate\Routing\Router;
use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;


/**
 * Wrapper extension for threef development
 *
 * @package Threef\Entree
 * @author joharijumali@gmail.com
 **/
class ExtensionServiceProvider extends ModuleServiceProvider
{

    /**
     * The application or extension group namespace.
     *
     * @var string|null
     */
    protected $routeGroup = 'extension';

    /**
     * The fallback route prefix.
     *
     * @var string
     */
    protected $routePrefix = 'extension/';


    /**
     * The application or extension namespace.
     *
     * @var string|null
     */
    protected $namespace = 'Threef\Extension\Http\Routing';

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
        'entree.menu:ready' => [
            'Threef\Extension\Handlers\Events\MenuHandlers'
        ]
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

        $this->publishOrchestraLang($path);

        $this->addLanguageComponent('threef/extension', 'extension', $path.'/lang');
        $this->addConfigComponent('threef/extension', 'extension', $path.'/config');
        $this->addViewComponent('threef/extension', 'extension', $path.'/views');

    }


    /**
     * Boot extension routing.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        $path = realpath(__DIR__);

        $this->loadFrontendRoutesFrom($path.'/routes.php');
    }


} // END class Entree 