<?php
declare(strict_types=1);

$root = __DIR__ . '/../';
require $root . 'vendor/autoload.php';

/** @var \Psr\Container\ContainerInterface $container */
$container = require $root . 'config/container.php';

$app = \Slim\Factory\AppFactory::createFromContainer($container);

(require $root . 'config/middleware.php')($app, $container);
(require $root . 'config/routes.php')($app);

$app->run();