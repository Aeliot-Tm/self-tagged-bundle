<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle;

interface TagSelfKeyAssignerInterface
{
    public static function getTagKey(): string;
}
