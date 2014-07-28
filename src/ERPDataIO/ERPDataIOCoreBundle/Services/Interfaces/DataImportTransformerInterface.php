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

namespace ERPDataIO\ERPDataIOCoreBundle\Services\Interfaces;

/**
 * Interface for data transformers
 */
interface DataImportTransformerInterface
{
    /**
     * Load raw data from files
     */
    public function loadData();

    /**
     * Get base directory path, where files to import are located
     */
    public function getBasePath();

    /**
     * Get categories file name
     */
    public function getCategoriesFile();

    /**
     * Get manufacturers file name
     */
    public function getManufacturersFile();

    /**
     * Get products file name
     */
    public function getProductsFile();

    /**
     * Get a collection of Category objects from raw data
     *
     * @return ArrayCollection
     */
    public function getCategories($rawCategories);

    /**
     * Get a collection of Manufacturer objects from raw data
     *
     * @return ArrayCollection
     */
    public function getManufacturers($rawManufacturers);

    /**
     * Get a collection of Product objects from raw data
     *
     * @return ArrayCollection
     */
    public function getProducts($rawProducts);
}