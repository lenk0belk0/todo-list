<?php
declare(strict_types=1);

namespace App\Entity\Task;

use Webmozart\Assert\Assert;

class Task
{
    private string $shortDescription;
    private string $longDescription;

    public function __construct(string $shortDescription, string $longDescription = '')
    {
        Assert::notEmpty($shortDescription);

        $this->shortDescription = $shortDescription;
        $this->longDescription = $longDescription;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getLongDescription(): string
    {
        return $this->longDescription;
    }
}
