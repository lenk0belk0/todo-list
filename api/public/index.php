<?php
declare(strict_types=1);

$root = __DIR__ . '/../';
require $root . 'vendor/autoload.php';

$builder = new \DI\ContainerBuilder();
$container = $builder->build();

$app = \Slim\Factory\AppFactory::createFromContainer($container);

// TODO add env and get displayErrorDetails value from env
$app->addErrorMiddleware(true, true, true);

(require $root . 'config/routes.php')($app);

$app->run();