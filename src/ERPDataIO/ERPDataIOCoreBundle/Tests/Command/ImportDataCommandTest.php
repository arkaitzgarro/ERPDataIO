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

namespace ERPDataIO\ERPDataIOCoreBundle\Tests\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use ERPDataIO\ERPDataIOCoreBundle\Command\ImportDataCommand;

/**
 * Tests ERPDataIO\ERPDataIOCoreBundle\Command\ImportDataCommand class
 */
class ImportDataCommandTest extends WebTestCase
{
    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
    }

    public function testExecute()
    {
        $application = new Application(static::$kernel);
        $application->add(new ImportDataCommand());

        $command = $application->find('erp:import');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array());

        $this->assertRegExp('/OK/', $commandTester->getDisplay());
    }
}