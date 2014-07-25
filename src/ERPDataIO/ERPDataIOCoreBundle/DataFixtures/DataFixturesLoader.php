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

namespace ERPDataIO\ERPDataIOCoreBundle\DataFixtures;

use ERPDataIO\ERPDataIOCoreBundle\Services\Interfaces\DataImportTransformerInterface;

/**
 * Class responsible for loading data fixture classes.
 */
class DataFixturesLoader
{
    /**
     * Array of fixture object instances to execute.
     *
     * @var array
     */
    private $fixtures = array();

    /**
     * The file extension of fixture files.
     *
     * @var string
     */
    private $fileExtension = '.php';

    /**
     * Find fixtures classes in a given directory and load them.
     *
     * @param string $dir Directory to find fixture classes in.
     * @return array $fixtures Array of loaded fixture object instances
     */
    public function loadFromDirectory($dir)
    {
        if (!is_dir($dir)) {
            throw new \InvalidArgumentException(sprintf('"%s" does not exist', $dir));
        }

        $fixtures = array();
        $includedFiles = array();

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($iterator as $file) {
            if (($fileName = $file->getBasename($this->fileExtension)) == $file->getBasename()) {
                continue;
            }
            $sourceFile = realpath($file->getPathName());
            require_once $sourceFile;
            $includedFiles[] = $sourceFile;
        }
        $declared = get_declared_classes();

        foreach ($declared as $className) {
            $reflClass = new \ReflectionClass($className);
            $sourceFile = $reflClass->getFileName();

            if (in_array($sourceFile, $includedFiles) && ! $this->isTransient($className)) {
                $fixture = new $className;
                $fixtures[] = $fixture;
                $this->addFixture($fixture);
            }
        }

        return $fixtures;
    }

    /**
     * Add a fixture object instance to the loader.
     *
     * @param DataImportTransformerInterface $fixture
     */
    public function addFixture(DataImportTransformerInterface $fixture)
    {
        $fixtureClass = get_class($fixture);

        if (!isset($this->fixtures[$fixtureClass])) {
            $this->fixtures[$fixtureClass] = $fixture;
        }
    }

    /**
     * Returns the array of data fixtures to execute.
     *
     * @return array $fixtures
     */
    public function getFixtures()
    {
        return $this->fixtures;
    }

    /**
     * Check if a given fixture is transient and should not be considered a data fixtures
     * class.
     *
     * @return boolean
     */
    public function isTransient($className)
    {
        $rc = new \ReflectionClass($className);
        if ($rc->isAbstract()) return true;

        $interfaces = class_implements($className);
        return in_array('ERPDataIO\ERPDataIOCoreBundle\Services\Interfaces\DataImportTransformerInterface', $interfaces) ? false : true;
    }
}