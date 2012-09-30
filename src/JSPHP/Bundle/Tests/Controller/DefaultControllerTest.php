<?php

namespace JSPHP\Bundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testPages()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('html:contains("HOME")')->count() > 0);

        $crawler = $client->request('GET', '/functions.html');
        $this->assertTrue($crawler->filter('html:contains("FUNCTIONS")')->count() > 0);

        $crawler = $client->request('GET', '/tests.html');
        $this->assertTrue($crawler->filter('html:contains("TESTS")')->count() > 0);

        $crawler = $client->request('GET', '/documentation.html');
        $this->assertTrue($crawler->filter('html:contains("DOCUMENTATION")')->count() > 0);

        $crawler = $client->request('GET', '/authors.html');
        $this->assertTrue($crawler->filter('html:contains("AUTHORS")')->count() > 0);

    }
}
