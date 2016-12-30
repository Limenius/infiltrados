<?php

namespace InfiltradosBundle\Setup;

use InfiltradosBundle\Entity\UserStatus;

class Fixtures
{
    private $em;
    private $userRepo;

    public function __construct($em, $userRepo)
    {
        $this->em = $em;
        $this->userRepo = $userRepo;
    }

    public function createUserStatus()
    {
        $users = $this->userRepo->findAll();
        foreach ($users as $player) {
            foreach ($users as $suspect) {
                $userStatus = new UserStatus();
                $userStatus->setPlayer($player);
                $userStatus->setSuspect($suspect);
                $userStatus->setStatus('hidden');
                $this->em->persist($userStatus);
            }

        }
        $this->em->flush();
    }
}
