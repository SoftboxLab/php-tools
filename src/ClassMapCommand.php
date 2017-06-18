<?php
/**
 * Created by PhpStorm.
 * User: tarcisio
 * Date: 17/06/17
 * Time: 14:43
 */

namespace Tools;

use Composer\Autoload\ClassMapGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ClassMapCommand extends Command {

    protected function configure() {
        $this->setName("classmap")
             ->addOption('dir', 'd', InputOption::VALUE_OPTIONAL, 'Diretório que serão escaneadas as classes', './')
             ->addOption('saida', 's', InputOption::VALUE_OPTIONAL, 'Nome do arquivo de classmap que será gerado', 'classmap.php');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $dir   = $input->getOption('dir');
        $saida = $input->getOption('saida');

        $output->writeln("Gerando classmap para '" . $dir . "'");

        ClassMapGenerator::dump([$input->getOption('dir')], $saida);

        $output->writeln("Arquivo de classmap gerado: " . $saida);
    }
}
