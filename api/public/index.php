<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// TODO add env and get displayErrorDetails value from env
$app->addErrorMiddleware(true, true, true);

$app->get('/', static function (Request $request, Response $response, array $args) {
    $response->getBody()->write(json_encode(['hello' => 'world']));
    return $response->withHeader('Content-type', 'application-json');
});

$app->run();