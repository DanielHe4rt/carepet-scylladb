<?php
namespace App;


use App\Owner\Controllers\OwnerController;
use Dotenv\Dotenv;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function run()
    {
        $dotenv = Dotenv::createImmutable(basePath());
        $dotenv->load();

        $dispatcher = simpleDispatcher(function(RouteCollector $router) {
            $router->get('/owners/{ownerId}', [OwnerController::class, 'handle']);
            $router->get('/owners/{id:\d+}/pets', [OwnerController::class, 'handle']);
            $router->get('/pets/{id:\d+}/sensors', [OwnerController::class, 'handle']);
            $router->get('/sensors/{id:\d+}', [OwnerController::class, 'handle']);
            $router->get('/sensors/{id:\d+}/daily', [OwnerController::class, 'handle']);
        });

        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo 'rota errada irmão';
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                break;
            case Dispatcher::FOUND:
                [$controller] = $routeInfo[1];
                $params = $routeInfo[2];
                (new $controller)(...(array_values($params)));
                break;
        }

    }
}