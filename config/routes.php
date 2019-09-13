<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    $routes->applyMiddleware('csrf');

    $routes->connect('/', ['controller' => 'Process', 'action' => 'index', 'home']);

    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->connect('/add/*', ['controller' => 'Process', 'action' => 'add']);
    $routes->connect('/process/changelanguage*', ['controller' => 'Process', 'action' => 'changelanguage']);
    $routes->connect('/manage', ['controller' => 'Process', 'action' => 'manage']);
    // $routes->connect('/language/view*', ['controller' => 'Language', 'action' => 'view']);

    $routes->fallbacks(DashedRoute::class);
});
