<?php declare(strict_types = 1);

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('test', new Route('/test', ['request-handler' => ['testHandler', 'get']]));

return $routes;
