<?php

namespace App\Listener\Entity;

use App\Entity\Thread;
use App\Entity\User;
use App\Utils\Slugger;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;

class UserListener implements EventSubscriber
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getSubscribedEvents()
    {
        return ['prePersist'];
    }

    public function prePersist(User $user)
    {
        $user->setPassword('admin');
    }

}