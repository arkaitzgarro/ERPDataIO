<?php

/**
 * ERPDataIOCoreBundle for Elcodi
 *
 * This Bundle is part of ERPDataIO bridge for Elcodi
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @link https://github.com/PaymentSuite/paymentsuite/blob/master/src/PaymentSuite/PaymentCoreBundle/Tests/Services/PaymentLoggerTest.php
 * @package ERPDataIOCoreBundle
 *
 * Arkaitz Garro 2014
 */

namespace ERPDataIO\ERPDataIOCoreBundle\Tests\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use ERPDataIO\ERPDataIOCoreBundle\DependencyInjection\ERPDataIOCoreExtension;

/**
 * Base abstract class for testing
 */
abstract class AbstractERPDataIOTest extends \PHPUnit_Framework_TestCase
{
    private $extension;
    private $container;

    public function setUp()
    {
        $this->extension = new ERPDataIOCoreExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);

    }

    /**
     * Returns DI container
     * @return \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected function getContainer()
    {
        return $this->container;
    }
}