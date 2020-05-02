<?php
declare(strict_types=1);

$root = __DIR__ . '/../';
require $root . 'vendor/autoload.php';

$builder = new \DI\ContainerBuilder();
$container = $builder->build();

$app = \Slim\Factory\AppFactory::createFromContainer($container);

(require $root . 'config/middleware.php')($app, $container);
(require $root . 'config/routes.php')($app);

$app->run();