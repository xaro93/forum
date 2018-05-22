<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 31.03.2018
 * Time: 23:59
 */

namespace App\DataFixtures;


use App\Entity\Post;
use App\Entity\Thread;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /* USER */
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $user->setEmail('user@forum.test');
        $user->setUsername('user@forum.test');
        $user->setPlainPassword('admin');

        $this->addReference('user', $user);
        $manager->persist($user);

        /* MODERATOR */
        $moderator = new User();
        $moderator->setRoles(['ROLE_MODERATOR']);
        $moderator->setEmail('moderator@forum.test');
        $moderator->setUsername('moderator@forum.test');
        $moderator->setPlainPassword('admin');

        $this->addReference('moderator', $moderator);
        $manager->persist($moderator);

        $manager->flush();
    }

}