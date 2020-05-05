<?php
declare(strict_types=1);

namespace App\Entity\Task;

use Webmozart\Assert\Assert;

class Task
{
    private string $id;
    private string $shortDescription;
    private ?string $longDescription;
    private \DateTime $createdAt;

    public function __construct(Id $id, string $shortDescription, ?string $longDescription = null)
    {
        $this->setShortDescription($shortDescription);
        $this->setLongDescription($longDescription);

        $this->id = $id->getValue();
        $this->createdAt = new \DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setShortDescription(string $shortDescription): self
    {
        Assert::notEmpty($shortDescription);

        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function setLongDescription(?string $longDescription): ?self
    {
        $this->longDescription = $longDescription;

        return $this;
    }
}
