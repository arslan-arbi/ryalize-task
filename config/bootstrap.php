<?php
require_once __DIR__  .'/../vendor/autoload.php';

use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$container = new Container();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$settings = require_once __DIR__.'/settings.php';

$settings($container);

$app = SlimAppFactory::create($container);

$twig = Twig::create('../views', ['cache' => false]);
$app->add(TwigMiddleware::create($app, $twig));

$middleware = require_once __DIR__ . '/middleware.php';

$middleware($app);

$routes = require_once  __DIR__ .'/routes.php';

$routes($app);

$containerObj = $app->getContainer();


$containerObj->view = function ($containerObj) {
    $view = new \Slim\Views\Twig('../views', [
        'cache' => 'path/to/cache'
    ]);

    // Instantiate and add Slim specific extension
    $router = $containerObj->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$app->run();
