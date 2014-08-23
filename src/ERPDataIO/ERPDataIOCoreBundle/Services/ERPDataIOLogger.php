<?php

/**
 * ERPDataIOCoreBundle for Elcodi
 *
 * This Bundle is part of ERPDataIO bridge for Elcodi
 *
 * @author David Pujadas <dpujadas@gmail.com>
 * @link https://github.com/PaymentSuite/paymentsuite/blob/master/src/PaymentSuite/PaymentCoreBundle/Services/PaymentLogger.php
 * @package ERPDataIOCoreBundle
 *
 * Arkaitz Garro 2014
 */

namespace ERPDataIO\ERPDataIOCoreBundle\Services;

use Psr\Log\LoggerInterface;

/**
 * ERPDataIO logger
 */
class ERPDataIOLogger
{
    /**
     * @var LoggerInterface
     *
     * Logger
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
     * @var string
     *
     * erpDataIOBundle
     */
    protected $erpDataIOBundle;

    /**
     * Construct method
     *
     * @param LoggerInterface $logger Logger
     * @param bool            $active Do log or not
     * @param string          $level  Log level
     */
    public function __construct(LoggerInterface $logger, $active, $level)
    {
        $this->logger = $logger;
        $this->active = $active;
        $this->level = $level;
    }

    /**
     * Log payment message, prepending payment bundle name if set
     *
     * @param string $message Message to log
     * @param array  $context Context
     *
     * @return PaymentLogger Self object
     */
    public function log($message, array $context = array())
    {
        if ($this->active) {
            if ($this->erpDataIOBundle) {
                $message = '[' . $this->erpDataIOBundle . '] ' . $message;
            }
            $this->logger->log($this->level, $message, $context);
        }

        return $this;
    }

    /**
     * Sets ERPDataIOBundle
     *
     * @param string $erpDataIOBundle ERPDataIOBundle
     *
     * @return PaymentLogger Self object
     */
    public function setERPDataIOBundle($erpDataIOBundle)
    {
        $this->erpDataIOBundle = $erpDataIOBundle;

        return $this;
    }

    /**
     * Get ERPDataIOBundle
     *
     * @return string ERPDataIOBundle
     */
    public function getERPDataIOBundle()
    {
        return $this->erpDataIOBundle;
    }

    /**
     * Sets Level
     *
     * @param string $level Level
     *
     * @return PaymentLogger Self object
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get Level
     *
     * @return string Level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Sets Active
     *
     * @param boolean $active Active
     *
     * @return PaymentLogger Self object
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get Active
     *
     * @return boolean Active
     */
    public function getActive()
    {
        return $this->active;
    }
}