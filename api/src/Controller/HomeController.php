<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $response->getBody()->write(json_encode(['hello' => 'world']));
        return $response->withHeader('Content-type', 'application-json');
    }
}