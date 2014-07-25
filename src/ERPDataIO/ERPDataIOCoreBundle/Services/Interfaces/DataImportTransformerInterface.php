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