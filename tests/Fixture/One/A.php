<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture\One;

use Aeliot\SelfTaggedBundle\TagSelfKeyAssignerInterface;

final class A implements TagSelfKeyAssignerInterface
{
    public static function getTagKey(): string
    {
        return 'a';
    }
}
