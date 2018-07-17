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
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;

class ThreadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        $path = $this->container->get('kernel')->getRootDir();
//        $fileTitlePath = $path .'/DataFixtures/files/loremTitle.txt';
//        $fileBodyPath = $path .'/DataFixtures/files/loremBody.txt';
//
//        $fileSystem = new Filesystem();

        for ($i = 0; $i < 1000; $i++) {
            $title = 'Lorem Ipsum'. $i;
            $body = 'Lorem Ipsum';

            $thread = new Thread();
            $thread->setTitle($title);
            $thread->setBody($body);

            $manager->persist($thread);
        }

        $manager->flush();
    }

}