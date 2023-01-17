<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture\Two;

final class SomeDescendant extends SomeChild
{
    public static function getTagKey(): string
    {
        return 'some-descendant';
    }
}
