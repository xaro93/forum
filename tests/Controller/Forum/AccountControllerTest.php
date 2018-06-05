<?php

namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class AccountControllerTest extends WebTestCase
{

    /**
     * @dataProvider getUrlsForRegularUsers
     */
    public function testUrlsForRegularUsers(string $httpMethod, string $url)
    {
        $client = static::createClient();

        $client->request($httpMethod, $url);
        $this->assertSame(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function getUrlsForRegularUsers()
    {
        yield ['GET', '/account/login'];
        yield ['GET', '/account/register'];
    }
}