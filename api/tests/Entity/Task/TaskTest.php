<?php

namespace App\Tests\Entity\Task;

use App\Entity\Task\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testCreateEmptyFails(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Task('');
    }

    public function testCreateWithValidValues(): void
    {
        $text1 = 'qwerty';
        $text2 = 'asdf';

        $task = new Task($text1, $text2);
        $this->assertSame($text1, $task->getShortDescription());
        $this->assertSame($text2, $task->getLongDescription());
    }
}
