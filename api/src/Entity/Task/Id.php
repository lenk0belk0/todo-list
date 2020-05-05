<?php
declare(strict_types=1);

namespace App\Entity\Task;


use Ramsey\Uuid\Uuid;
use Webmozart\Assert\Assert;

class Id
{
    private string $value;

    public function __construct($value)
    {
        Assert::uuid($value);

        $this->value = $value;
    }

    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->value;
    }
}