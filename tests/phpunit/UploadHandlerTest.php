<?php

use PHPUnit\Framework\TestCase;

class UploadHandlerTest extends TestCase
{	
	private $uploadHander;

	public function setUp()
	{
		global $container;
		$this->uploadHandler = $container->get('HoetlTool\Handler\UploadHandler');
	}
	public function testHandler()
	{
	}
}
