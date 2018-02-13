<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Process\Process;

class UploadControllerTest extends TestCase
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
        $this->uri    = 'http://localhost:' . getenv('PORT') . '/';
        $this->client = new Client(['http_errors' => false]);
    }

    public function testUpload()
    {
        $response = $this->client->request('POST', $this->uri, ['multipart' => [
            [
                'name'     => 'file',
                'contents' => '',
                'filename' => 'test.csv',
            ],
            [
                'name'     => 'fileName',
                'contents' => 'test.csv',
            ],
            [
                'name'     => 'format',
                'contents' => 'JSON',
            ],
        ]]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public static function tearDownAfterClass()
    {
        self::$process->stop();
    }

}
