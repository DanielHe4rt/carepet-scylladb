<?php

namespace App;

use App\Owner\Controllers\OwnerController;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Router
{
    public static function map(): Dispatcher
    {
        return simpleDispatcher(function(RouteCollector $router) {
            $router->get('/owners/{ownerId}', [OwnerController::class]);
            $router->get('/owners/{id:\d+}/pets', [OwnerController::class, 'handle']);
            $router->get('/pets/{id:\d+}/sensors', [OwnerController::class, 'handle']);
            $router->get('/sensors/{id:\d+}', [OwnerController::class, 'handle']);
            $router->get('/sensors/{id:\d+}/daily', [OwnerController::class, 'handle']);
        });
    }
}