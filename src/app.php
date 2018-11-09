<?php declare(strict_types = 1);

use DelOlmo\Middleware\SymfonyRouterMiddleware;
use Middlewares\RequestHandler;
use mindplay\middleman\Dispatcher;
use Psr\Container\ContainerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Router;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

/** @var \Nette\DI\Container $container */
$container = require 'container.php';
$request = ServerRequestFactory::fromGlobals();

$locator = new FileLocator(__DIR__);
$mainRoute = new Router(
    new PhpFileLoader($locator),
    'routes.php'
);

$dispatcher = new Dispatcher([
    new SymfonyRouterMiddleware($mainRoute),
    new RequestHandler($container->getByType(ContainerInterface::class)),
]);

$response = $dispatcher->dispatch($request);
$emitter = new SapiEmitter();
$emitter->emit($response);
