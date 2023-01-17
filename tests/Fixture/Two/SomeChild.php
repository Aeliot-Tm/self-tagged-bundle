<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture\Two;

class SomeChild extends SomeParent
{
    public static function getTagKey(): string
    {
        return 'some-child';
    }
}
