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

namespace ERPDataIO\ERPDataIOCoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use ERPDataIO\ERPDataIOCoreBundle\DataFixtures\DataFixturesLoader;
use InvalidArgumentException;

class ImportDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('erp:import')
            ->setDescription('Import data from ERP into Elcodi')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->getContainer()->get('erpdataio.logger');
        $logger->log('ERP data import command executed');

        if ($input->isInteractive()) {
            $helper = $this->getHelper('question');
            $question = new ConfirmationQuestion('Careful, database will be purged. Do you want to continue Y/N ? ', false);
            if (!$helper->ask($input, $output, $question)) {
                return;
            }
        }

        $paths = array();
        foreach ($this->getApplication()->getKernel()->getBundles() as $bundle) {
            $paths[] = $bundle->getPath().'/DataFixtures/ERP';
        }

        $loader = new DataFixturesLoader($this->getContainer());
        foreach ($paths as $path) {
            if (is_dir($path)) {
                $loader->loadFromDirectory($path);
            }
        }

        $fixtures = $loader->getFixtures();
        if (!$fixtures) {
            throw new InvalidArgumentException(
                sprintf('Could not find any fixtures to execute in: %s', "\n\n- ".implode("\n- ", $paths))
            );
        }

        $dataImporterManager = $this->getContainer()->get('erpdataio.importer');
        foreach ($fixtures as $fixture) {
            $dataImporterManager->loadData($fixture);
        }

        $output->writeln('OK');
    }
}