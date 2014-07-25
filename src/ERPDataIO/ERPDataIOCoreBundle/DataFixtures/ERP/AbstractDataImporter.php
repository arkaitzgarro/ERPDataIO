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

namespace ERPDataIO\ERPDataIOCoreBundle\DataFixtures\ERP;

use ERPDataIO\ERPDataIOCoreBundle\Services\Interfaces\DataImportTransformerInterface;

/**
 * Base class responsible of data transforming
 */
abstract class AbstractDataImporter implements DataImportTransformerInterface
{
    /**
     * RAW data
     */
    private $data;

    /**
     * Load raw data from files
     */
    public function loadData()
    {
        $this->data = 'DATA';
    }

}