<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$builder = new \DI\ContainerBuilder();
$container = $builder->build();

$app = \Slim\Factory\AppFactory::createFromContainer($container);

// TODO add env and get displayErrorDetails value from env
$app->addErrorMiddleware(true, true, true);

$app->get('/', \App\Controller\HomeController::class);

$app->run();