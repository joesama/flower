<?php namespace Joesama\Flower;

use Illuminate\Routing\Router;
use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;


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
    protected $routePrefix = 'flower/';


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