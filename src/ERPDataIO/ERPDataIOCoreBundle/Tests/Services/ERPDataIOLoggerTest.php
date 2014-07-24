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
use ERPDataIO\ERPDataIOCoreBundle\Services\ERPDataIOLogger;

/**
 * Tests ERPDataIO\ERPDataIOCoreBundle\Services\ERPDataIOLogger class
 */
class ERPDataIOLoggerTest extends AbstractERPDataIOTest
{

    /**
     * @var ERPDataIOLogger
     *
     * Payment logger
     */
    protected $erpDataIOLogger;

    /**
     * @var LoggerInterface
     *
     * logger
     */
    protected $logger;

    /**
     * @var bool
     *
     * active
     */
    protected $active;

    /**
     * @var string
     *
     * level
     */
    protected $level;

    /**
     * Set up
     */
    public function setUp()
    {
        parent::setUp();

        $this->logger = $this
            ->getMockBuilder('Psr\Log\LoggerInterface')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $this->active = true;
        $this->level = 'info';

        $this->erpDataIOLogger = new ERPDataIOLogger($this->logger, $this->active, $this->level);
    }

    /**
     * Tests log()
     */
    public function testLog()
    {
        $this->logger
            ->expects($this->once())
            ->method('log')
            ->will($this->returnValue(null))
        ;

        $this->erpDataIOLogger->log('Test payment logger');
    }

    /**
     * Tests log with false usage
     */
    public function testDoNotLog()
    {
        $this->logger
            ->expects($this->never())
            ->method('log')
            ->will($this->returnValue(null))
        ;

        $this->erpDataIOLogger->setActive(false);
        $this->erpDataIOLogger->log('This should not be logged');
    }
}