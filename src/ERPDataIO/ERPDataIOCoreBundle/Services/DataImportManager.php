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
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use ERPDataIO\ERPDataIOCoreBundle\Services\Interfaces\DataImportTransformerInterface;

/**
 * Data import manager
 */
class DataImportManager
{
    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Construct method
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     * @param Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ObjectManager $manager, ContainerInterface $container)
    {
        $this->em = $manager;
        $this->container = $container;
    }

    public function loadData(DataImportTransformerInterface $fixture)
    {
        $fixture->setContainer($this->container);
        $fixture->loadData();
    }

    public function saveCategories(ArrayCollection $categories)
    {

    }
}