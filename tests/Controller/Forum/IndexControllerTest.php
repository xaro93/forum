<?php

namespace App\Tests\Controller;

use App\Entity\Thread;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class IndexControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertCount(
            Thread::NUM_ITEMS,
            $crawler->filter('ul.li'),
            'The homepage displays the right number of posts.'
        );
    }
}