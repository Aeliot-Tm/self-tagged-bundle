<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture;

final class Registry
{
    /**
     * @var iterable<string,object>
     */
    private iterable $services;

    /**
     * @param iterable<string,object> $services
     */
    public function __construct(iterable $services)
    {
        $this->services = $services;
    }

    /**
     * @return iterable<string,object>
     */
    public function getServices(): iterable
    {
        return $this->services;
    }
}
