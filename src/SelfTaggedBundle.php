<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle;

use Aeliot\SelfTaggedBundle\DependencyInjection\Compiler\TagSelfKeyAssignerCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SelfTaggedBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new TagSelfKeyAssignerCompilerPass());
    }
}
