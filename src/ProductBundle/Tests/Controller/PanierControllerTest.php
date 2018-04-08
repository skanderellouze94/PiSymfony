<?php

namespace ProductBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PanierControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Ajouter');
    }

    public function testSupprimmer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Supprimmer');
    }

    public function testPass()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Pass');
    }

    public function testBasket()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Basket');
    }

}
