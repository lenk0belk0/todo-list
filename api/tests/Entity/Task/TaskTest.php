<?php
declare(strict_types=1);

namespace App\Tests\Entity\Task;

use App\Entity\Task\Id;
use App\Entity\Task\Task;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TaskTest extends TestCase
{
    public function testRequireShortName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Task(Id::generate(), '');
    }

    public function testCreateWithValidValues(): void
    {
        $uuid = Uuid::uuid4()->toString();
        $text1 = 'qwerty';
        $text2 = 'asdf';

        $task = new Task(new Id($uuid), $text1, $text2);
        $this->assertSame($uuid, $task->getId());
        $this->assertSame($text1, $task->getShortDescription());
        $this->assertSame($text2, $task->getLongDescription());
    }
}
