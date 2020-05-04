<?php
declare(strict_types=1);

namespace App\Tests\Service\Http;

use App\Service\Http\JsonResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class JsonResponseTest extends TestCase
{
    public function testReturnResponseInstance(): void
    {
        $response = new JsonResponse();

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame(['application-json'], $response->getHeader('Content-type'));
    }

    public function testReturnValidJson(): void
    {
        $response = new JsonResponse(['hello' => 'world']);

        $this->assertSame('{"hello":"world"}', $response->getBody()->getContents());
    }
}
