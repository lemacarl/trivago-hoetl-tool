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

    public static function setUpBeforeClass()
    {
        $port          = getenv('PORT');
        self::$process = new Process("php -S 0.0.0.0:{$port} -t " . WEB_ROOT);
        self::$process->start();
    }

    public function testIndex()
    {
        $port = getenv('PORT');

        $client   = new Client(['http_errors' => false]);
        $response = $client->request('GET', "http://localhost:{$port}");
        $body     = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('<h1>HoETL Tool</h1>', $body);
    }

    public static function tearDownAfterClass()
    {
        self::$process->stop();
    }
}
