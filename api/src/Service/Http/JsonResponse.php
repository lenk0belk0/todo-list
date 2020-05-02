<?php
declare(strict_types=1);

namespace App\Service\Http;

use Fig\Http\Message\StatusCodeInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Response;

class JsonResponse extends Response
{
    public function __construct($data, int $status = StatusCodeInterface::STATUS_OK)
    {
        parent::__construct(
            $status,
            new Headers(['Content-type' => 'application-json']),
            (new StreamFactory())->createStream(json_encode($data))
        );
    }
}