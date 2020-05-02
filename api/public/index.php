<?php
declare(strict_types=1);

use App\Controller\HomeController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// TODO add env and get displayErrorDetails value from env
$app->addErrorMiddleware(true, true, true);

$app->get('/', HomeController::class);

$app->run();