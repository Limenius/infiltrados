<?php

namespace InfiltradosBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserStatusCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('infiltrados:create-user-status')
            ->setDescription('Creates UserStatus entries')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creator = $this->getContainer()->get('infiltrados.setup.fixtures');
        $creator->createUserStatus();
    }
}
