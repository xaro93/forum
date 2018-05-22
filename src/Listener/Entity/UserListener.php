<?php

namespace App\Listener\Entity;

use App\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserListener implements EventSubscriber
{
    private $entityManager;
    private $passwordEncoder;

    public function __construct(EntityManager $entityManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getSubscribedEvents()
    {
        return ['prePersist'];
    }

    public function prePersist(User $user)
    {
        if($user->getPlainPassword()){
            $password = $this->passwordEncoder->encodePassword(
                $user,
                $user->getPlainPassword()
            );
            $user->setPassword($password);
        }
    }

}