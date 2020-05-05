<?php
declare(strict_types=1);

namespace App\Tests\Service\Task;

use App\Service\Task\CreateTaskCommand;
use PHPUnit\Framework\TestCase;

class CreateTaskCommandTest extends TestCase
{
    public function testPropertiesExists(): void
    {
        $this->assertClassHasAttribute('shortDescription', CreateTaskCommand::class);
        $this->assertClassHasAttribute('longDescription', CreateTaskCommand::class);
    }

    public function testCommandHasDefaultPropertiesValues(): void
    {
        $command = new CreateTaskCommand();

        $this->assertNull($command->shortDescription);
        $this->assertNull($command->longDescription);
    }

    public function testSetValuesToCommand(): void
    {
        $command = new CreateTaskCommand();
        $command->shortDescription = 'some text';
        $command->longDescription = 'some another text';

        $this->assertSame('some text', $command->shortDescription);
        $this->assertSame('some another text', $command->longDescription);
    }
}
