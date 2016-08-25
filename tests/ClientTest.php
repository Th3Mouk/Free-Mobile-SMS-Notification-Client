<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\FreeMobileSMSNotif\Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Th3Mouk\FreeMobileSMSNotif\Client;
use Th3Mouk\FreeMobileSMSNotif\Tests\Entity\BazingaEntity;

class ClientTest extends TestCase
{
    public function testClientResponse()
    {
        $mock = new MockHandler([
            new Response(200),
            new Response(400),
            new Response(402),
            new Response(403),
            new Response(500),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new GuzzleClient(['handler' => $handler]);

        $freeMobileClient = $this->createTestClient();
        $freeMobileClient->setHttpClient($client);

        $response = $freeMobileClient->send('Test Message');
        $this->assertTrue(200 === $response->getStatusCode());

        $response = $freeMobileClient->send('Test Message');
        $this->assertTrue(400 === $response->getStatusCode());

        $response = $freeMobileClient->send('Test Message');
        $this->assertTrue(402 === $response->getStatusCode());

        $response = $freeMobileClient->send('Test Message');
        $this->assertTrue(403 === $response->getStatusCode());

        $response = $freeMobileClient->send('Test Message');
        $this->assertTrue(500 === $response->getStatusCode());
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testExceptionString()
    {
        $freeMobileClient = $this->createTestClient();

        $freeMobileClient->send(new BazingaEntity());
    }

    public function testClientAttributes()
    {
        $freeMobileClient = $this->createTestClient();
        $this->assertSame('test', $freeMobileClient->getLogin());
        $this->assertSame('test', $freeMobileClient->getkey());
        $this->assertInstanceOf('GuzzleHttp\Client', $freeMobileClient->getHttpClient());
    }

    public function createTestClient()
    {
        $login = 'test';
        $key = 'test';

        return new Client($login, $key);
    }
}
