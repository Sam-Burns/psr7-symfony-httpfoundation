<?php
namespace SamBurns\Psr7Symfony\Test;

use PHPUnit_Framework_TestCase as TestCase;
use SamBurns\Psr7Symfony\Request;

class RequestTest extends TestCase
{
    public function setUp()
    {

    }

    public function testWithHeader()
    {
        // ARRANGE
        $request = new Request();

        // ACT
        $result = $request->withHeader(
            'User-Agent',
            'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0'
        );

        // ASSERT
        $this->assertInstanceOf('\SamBurns\Psr7Symfony\Request', $result);
        $this->assertEquals(
            'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0',
            $result->getHeader('User-Agent')
        );
    }
}
