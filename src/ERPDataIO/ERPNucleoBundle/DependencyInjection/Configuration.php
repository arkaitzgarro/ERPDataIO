<?php

/**
 * ERPNucleoBundle for Elcodi
 *
 * This Bundle is part of ERPDataIO bridge for Elcodi
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 * @package ERPNucleoBundle
 *
 * Arkaitz Garro 2014
 */

namespace ERPDataIO\ERPNucleoBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('erp_nucleo');

        $rootNode
            ->children()
                ->scalarNode('base_path')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $treeBuilder;
    }
}