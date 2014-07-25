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

namespace ERPDataIO\ERPNucleoBundle;

use Doctrine\Common\Collections\ArrayCollection;
use ERPDataIO\ERPDataIOCoreBundle\DataFixtures\ERP\AbstractDataImporter;

/**
 * Nucleo ERPDataIO Bundle
 */
class NucleoDataImporter extends AbstractDataImporter
{
    /**
     * Get base path for data files
     *
     * @return String Base path
     */
    public function getBasePath()
    {
        return $this->getContainer()->getParameter('erp.nucleo.base_path').DIRECTORY_SEPARATOR;
    }

    /**
     * Get path for categories file
     *
     * @return String Categories file path
     */
    public function getCategoriesFile()
    {
        return $this->getContainer()->getParameter('erp.nucleo.categories.file');
    }

    /**
     * Get path for manufacturers file
     *
     * @return String Manufacturers file path
     */
    public function getManufacturersFile()
    {
        return $this->getContainer()->getParameter('erp.nucleo.manufacturers.file');
    }

    /**
     * Get path for products file
     *
     * @return String Products file path
     */
    public function getProductsFile()
    {
        return $this->getContainer()->getParameter('erp.nucleo.products.file');
    }

    /**
     * Get a collection of Category objects from raw data
     *
     * @return ArrayCollection
     */
    public function getCategories($rawCategories)
    {
        return new ArrayCollection();
    }

    /**
     * Get a collection of Manufacturer objects from raw data
     *
     * @return ArrayCollection
     */
    public function getManufacturers($rawManufacturers)
    {

    }

    /**
     * Get a collection of Product objects from raw data
     *
     * @return ArrayCollection
     */
    public function getProducts($rawProducts)
    {

    }
}