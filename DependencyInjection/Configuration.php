<?php

namespace Grossum\ContactBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
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
