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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ERPNucleoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('erp.nucleo.base_path', $config['base_path']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('parameters.yml');
        // $loader->load('services.yml');
    }
}