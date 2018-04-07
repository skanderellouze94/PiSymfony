<?php

namespace ProductBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandeControllerTest extends WebTestCase
{
    public function testShowu()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ShowU');
    }

    public function testShowp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ShowP');
    }

}
