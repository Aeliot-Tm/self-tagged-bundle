<?php

declare(strict_types=1);

namespace Aeliot\SelfTaggedBundle\DependencyInjection\Compiler;

use Aeliot\SelfTaggedBundle\TagSelfKeyAssignerInterface;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

final class TagSelfKeyAssignerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        foreach ($container->getDefinitions() as $serviceId => $definition) {
            $class = $this->getClass($definition, $container, $serviceId);
            if (!is_subclass_of($class, TagSelfKeyAssignerInterface::class)) {
                continue;
            }

            $key = $class::getTagKey();
            $tags = $this->getTags($definition, $serviceId);
            $tags = $this->updateTags($tags, $key, $serviceId);

            $definition->setTags($tags);
        }
    }

    /**
     * @param string|class-string $serviceId
     *
     * @return class-string
     */
    private function getClass(Definition $definition, ContainerBuilder $container, string $serviceId): string
    {
        if (class_exists($serviceId)) {
            return $serviceId;
        }

        while ((null === $class = $definition->getClass()) && $definition instanceof ChildDefinition) {
            $definition = $container->findDefinition($definition->getParent());
        }

        /* @var class-string|null $class */
        if (null === $class) {
            throw new RuntimeException(sprintf('Invalid service "%s": the class is not set.', $class));
        }

        return $class;
    }

    /**
     * @return array<string,array<int,array<string,string|int>>>
     */
    private function getTags(Definition $definition, int|string $serviceId): array
    {
        $tags = $definition->getTags();

        if (!((bool) $tags) && !$definition->isAbstract()) {
            throw new \LogicException(sprintf('Definition of "%s" does not have assigned tags', $serviceId));
        }

        return $tags;
    }

    /**
     * @param array<string,array<int,array<string,string|int>>> $tags
     *
     * @return array<string,array<int,array<string,string|int>>>
     */
    private function updateTags(array $tags, string $key, int|string $serviceId): array
    {
        // TODO: configure "indexBy" in order to tags
        $indexBy = 'key';
        foreach ($tags as $tagName => $tagsAttributes) {
            foreach ($tagsAttributes as $index => $attribute) {
                if (isset($attribute[$indexBy])) {
                    throw new \LogicException(sprintf('Service "%s" has tag "%s" (#%s) with attribute "%s"', $serviceId, $tagName, $index, $indexBy));
                }
                $tags[$tagName][$index][$indexBy] = $key;
            }
        }

        return $tags;
    }
}
