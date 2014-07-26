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
use Elcodi\ProductBundle\Entity\Category;
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
        return $this->getContainer()->getParameter('erp.nucleo.base_path');
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
        $data = json_decode($rawCategories);

        foreach ($data->rows as $key => $cat) {
            $category = $this->getContainer()->get('elcodi.factory.category')->create();
            $category->setName($cat->descrip);
            $category->setName($cat->descrip);
        }

        return new ArrayCollection();
    }

    /**
     * Get a collection of Manufacturer objects from raw data
     *
     * @return ArrayCollection
     */
    public function getManufacturers($rawManufacturers)
    {
        return new ArrayCollection();
    }

    /**
     * Get a collection of Product objects from raw data
     *
     * @return ArrayCollection
     */
    public function getProducts($rawProducts)
    {
        return new ArrayCollection();
    }
}