<?php
declare(strict_types=1);

namespace App\Tests\Entity\Task;

use App\Entity\Task;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class IdTest extends TestCase
{
    /**
     * @param string $value
     *
     * @dataProvider invalidValuesDataProvider
     */
    public function testRequireUuid(string $value): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Task\Id($value);
    }

    public function invalidValuesDataProvider(): array
    {
        return [
            [''],
            ['123'],
            ['aaa']
        ];
    }

    public function testCreateValid(): void
    {
        $uuid = new Task\Id(Uuid::uuid4()->toString());

        $this->assertIsString($uuid->getValue());
        $this->assertNotEmpty($uuid->getValue());
    }

    public function testGenerate(): void
    {
        $uuid = Task\Id::generate();

        $this->assertIsString($uuid->getValue());
        $this->assertNotEmpty($uuid->getValue());
    }
}
