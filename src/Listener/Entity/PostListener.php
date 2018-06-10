<?php

namespace App\Listener\Entity;

use App\Entity\Thread;
use App\Utils\Slugger;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;

class PostListener implements EventSubscriber
{
    private $entityManager;
    private $slugger;

    public function __construct(EntityManager $entityManager, Slugger $slugger)
    {
        $this->entityManager = $entityManager;
        $this->slugger = $slugger;
    }

    public function getSubscribedEvents()
    {
        return [];
    }
}