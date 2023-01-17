<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture\One;

use Aeliot\SelfTaggedBundle\TagSelfKeyAssignerInterface;

final class C implements TagSelfKeyAssignerInterface
{
    public static function getTagKey(): string
    {
        return 'c';
    }
}
