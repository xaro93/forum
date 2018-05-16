<?php

namespace App\Listener;

use App\Entity\Thread;
use App\Utils\Slugger;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;

class ThreadListener implements EventSubscriber
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
        return ['prePersist'];
    }

    public function prePersist(Thread $thread)
    {
        $slug = $this->slugger->slugify($thread->getTitle());
        $thread->setSlug($slug);
    }

}