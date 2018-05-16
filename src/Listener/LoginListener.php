<?php

namespace App\Listener;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onLogin(InteractiveLoginEvent $event)
    {

    }

}