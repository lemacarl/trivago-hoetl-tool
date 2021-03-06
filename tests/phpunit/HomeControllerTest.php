<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Process\Process;

/**
 * Class HomeControllerTest
 */
class HomeControllerTest extends TestCase
{
    private static $process;
    private $client;
    private $uri;

    public static function setUpBeforeClass()
    {
        $port          = getenv('PORT');
        self::$process = new Process("php -S 0.0.0.0:{$port} -t " . WEB_ROOT);
        self::$process->start();
    }

    public function setUp()
    {
        $this->uri    = 'http://localhost:' . getenv('PORT');
        $this->client = new Client(['http_errors' => false]);
    }

    public function testIndex()
    {
        $response = $this->client->request('GET', $this->uri);
        $body     = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('<h1>HoETL Tool</h1>', $body);
    }

    public static function tearDownAfterClass()
    {
        self::$process->stop();
    }
}
