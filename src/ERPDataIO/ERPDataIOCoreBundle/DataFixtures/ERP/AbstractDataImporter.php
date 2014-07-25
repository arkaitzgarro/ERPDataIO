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

use Symfony\Component\DependencyInjection\ContainerInterface;
use ERPDataIO\ERPDataIOCoreBundle\Services\Interfaces\DataImportTransformerInterface;

/**
 * Base class responsible of data transforming
 */
abstract class AbstractDataImporter implements DataImportTransformerInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * RAW data
     */
    private $data;

    /**
     *
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     *
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Load raw data from files
     */
    public function loadData()
    {
        $categoriesPath = $this->getCategoriesFile();
    }

}