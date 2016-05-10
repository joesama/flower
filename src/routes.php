<?php
use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

 Foundation::group('threef/extension', 'extension', ['middleware' => ['web']], function (Router $router) {

 		// Example of implementation
		// $router->get('/password', 'Auth\Password@edit');
		// $router->post('/password', 'Auth\Password@update');
 });