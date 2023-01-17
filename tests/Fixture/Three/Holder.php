<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture\Three;

final class Holder
{
    /**
     * @var string[]
     */
    private array $values;

    /**
     * @param string[] $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function add(string $value): void
    {
        $this->values[] = $value;
    }

    /**
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
