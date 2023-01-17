<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\Test\Fixture\Two;

use Aeliot\SelfTaggedBundle\TagSelfKeyAssignerInterface;

class SomeParent implements TagSelfKeyAssignerInterface
{
    public static function getTagKey(): string
    {
        return 'some-parent';
    }
}
