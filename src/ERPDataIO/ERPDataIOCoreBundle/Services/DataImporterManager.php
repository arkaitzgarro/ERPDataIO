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

namespace ERPDataIO\ERPDataIOCoreBundle\Services;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Data importer manager
 */
class DataImporterManager
{
    /**
     * Entity manager
     */
    private $em;

    /**
     * Construct method
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function __construct(ObjectManager $manager)
    {
        $this->em = $manager;
    }
}