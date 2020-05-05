<?php
declare(strict_types=1);

namespace App\Service\Task;

class CreateTaskCommand
{
    public ?string $shortDescription;
    public ?string $longDescription;

    public function __construct()
    {
        $this->shortDescription = null;
        $this->longDescription = null;
    }
}
