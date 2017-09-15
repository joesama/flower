<?php
use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

 Foundation::group('flow', 'flower', ['middleware' => ['web','auth','entree']], function (Router $router) {

 		// Example of implementation
		$router->get('/registered', 'RegisteredFlowRouting@registeredFlow');
		$router->get('/new/{id?}', 'RegisteredFlowRouting@newFlow');
		$router->post('/new/{id?}', 'RegisteredFlowRouting@saveFlowData');
		// $router->post('/password', 'Auth\Password@update');


		$router->get('/steps/{code}/{id}/{parent?}', 'RegisteredStepsRouting@newStep')
			->where(['id' => '[0-9]+'])
			->where(['parent' => '[0-9]+']);
		$router->get('/steps/{code}/form/{parent?}', 'RegisteredStepsRouting@newStep')
			->where(['parent' => '[0-9]+']);
		$router->post('/steps/{code}/{id}/{parent?}', 'RegisteredStepsRouting@saveStep')
			->where(['parent' => '[0-9]+']);
		$router->get('/steps/{code}', 'RegisteredStepsRouting@registeredStep');


 });

