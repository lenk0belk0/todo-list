<?php
declare(strict_types=1);

namespace App\Tests\Entity\Task;

use App\Entity\Task\Id;
use App\Entity\Task\Task;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TaskTest extends TestCase
{
    public function testRequireNotEmptyShortName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Task(Id::generate(), '');
    }

    public function testCreateWithValidValues(): Task
    {
        $uuid = Uuid::uuid4()->toString();
        $text1 = 'qwerty';
        $text2 = 'asdf';

        $task = new Task(new Id($uuid), $text1, $text2);
        $this->assertSame($uuid, $task->getId());
        $this->assertSame($text1, $task->getShortDescription());
        $this->assertSame($text2, $task->getLongDescription());
        $this->assertNotEmpty($task->getCreatedAt());

        return $task;
    }

    /**
     * @depends testCreateWithValidValues
     */
    public function testSetDescriptions(Task $task): void
    {
        $newShortDescription = 'new text';
        $newLongDescription = 'new long text';

        $task
            ->setShortDescription($newShortDescription)
            ->setLongDescription($newLongDescription)
        ;

        $this->assertSame($newShortDescription, $task->getShortDescription());
        $this->assertSame($newLongDescription, $task->getLongDescription());
    }

    /**
     * @depends testCreateWithValidValues
     */
    public function testRequireValidValueToSetShortDescription(Task $task): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $task->setShortDescription('');
    }
}
