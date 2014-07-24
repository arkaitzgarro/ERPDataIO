<?php

/**
 * ERPDataIOCoreBundle for Elcodi
 *
 * This Bundle is part of ERPDataIO bridge for Elcodi
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 *
 * @package ERPDataIOCoreBundle
 *
 * Arkaitz Garro 2014
 */

namespace ERPDataIO\ERPDataIOCoreBundle\Tests\Services;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use ERPDataIO\ERPDataIOCoreBundle\DependencyInjection\ERPDataIOCoreExtension;

/**
 * Tests ERPDataIO\ERPDataIOCoreBundle\Services\ERPDataIOExtensionTest class
 */
class ERPDataIOExtensionTest extends AbstractExtensionTestCase
{

    protected function getContainerExtensions()
    {
        return array(
            new ERPDataIOCoreExtension()
        );
    }

    /**
     * @test
     */
    public function testLoggerService()
    {
        $this->load();

        $this->assertContainerBuilderHasService('erpdataio.logger');
    }

    /**
     * @test
     */
    public function testContainerParameters()
    {
        $this->load();

        $this->assertContainerBuilderHasParameter('erpdataio.logger.class');
        $this->assertContainerBuilderHasParameter('erpdataio.logger.active');
        $this->assertContainerBuilderHasParameter('erpdataio.logger.level');
        $this->assertContainerBuilderHasParameter('erpdataio.input.data_format');
        $this->assertContainerBuilderHasParameter('erpdataio.output.data_format');
    }
}