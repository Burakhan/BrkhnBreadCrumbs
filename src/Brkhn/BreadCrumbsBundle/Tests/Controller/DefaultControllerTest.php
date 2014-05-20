<?php

namespace Brkhn\BreadCrumbsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/burakhan');

        $this->assertTrue($crawler->filter('html:contains("burakhan")')->count() > 0);
    }
}
