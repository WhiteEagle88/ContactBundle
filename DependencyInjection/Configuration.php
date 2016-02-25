<?php

namespace Grossum\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('grossum_contact');

        $this->addModelSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     */
    private function addModelSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('contact')->defaultValue('Application\\Grossum\\ContactBundle\\Entity\\Contact')->end()
                        ->scalarNode('email')->defaultValue('Application\\Grossum\\ContactBundle\\Entity\\Email')->end()
                        ->scalarNode('phone')->defaultValue('Application\\Grossum\\ContactBundle\\Entity\\Phone')->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
