<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\Http\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;

class HomeController implements RequestHandlerInterface
{
    public function handle(Request $request): Response
    {
        return new JsonResponse(['hello' => 'world']);
    }
}