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

use Symfony\Component\Finder\Finder;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Data load manager
 */
class DataLoadManager
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Construct method
     *
     * @param Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Load file contents
     *
     * @return String File content
     */
    public function loadFile($base_path, $file)
    {
        $finder = new Finder();
        $absolute_path = $this->container->get('kernel')->getRootDir().'/../web/'.$base_path;
        $finder->files()->in($absolute_path)->name($file);

        foreach ($finder as $file) {
            return $file->getContents();
        }
    }
}