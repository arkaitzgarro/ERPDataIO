<?php

/**
 * ERPDataIOCoreBundle for Elcodi
 *
 * This Bundle is part of ERPDataIO bridge for Elcodi
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 * @package ERPDataIOCoreBundle
 *
 * Arkaitz Garro 2014
 */

namespace ERPDataIO\ERPDataIOCoreBundle\DependencyInjection;

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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('erpdataio_core');

        $rootNode
            ->children()
                ->arrayNode('logger')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('active')
                            ->defaultTrue()
                        ->end()
                        ->scalarNode('level')
                            ->defaultValue('info')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('input')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('data_format')
                            ->defaultValue('json')
                        ->end()
                    ->end()
                ->end();
                ->arrayNode('output')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('data_format')
                            ->defaultValue('json')
                        ->end()
                    ->end()
                ->end();
            ->end();

        return $treeBuilder;
    }
}