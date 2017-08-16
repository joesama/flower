<?php
use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

 Foundation::group('flow', 'flower', ['middleware' => ['web']], function (Router $router) {

 		// Example of implementation
		$router->get('/registered', 'RegisteredFlowRouting@registeredFlow');
		$router->get('/new/{id?}', 'RegisteredFlowRouting@newFlow');
		$router->post('/new/{id?}', 'RegisteredFlowRouting@saveFlowData');
		// $router->post('/password', 'Auth\Password@update');

 });

