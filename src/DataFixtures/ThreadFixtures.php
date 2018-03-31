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

class ThreadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $thread = new Thread();
            $thread->setTitle('Thread: ' . $i);

            $post = new Post();
            $post->setThread($thread);
            $post->setContent('First post for thread: ' . $i);

            $manager->persist($thread);
            $manager->persist($post);
        }

        $manager->flush();
    }

}