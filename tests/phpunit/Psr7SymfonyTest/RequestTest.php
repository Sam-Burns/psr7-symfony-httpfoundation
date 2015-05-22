<?php
namespace SamBurns\Psr7Symfony\Test;

use PHPUnit_Framework_TestCase as TestCase;
use SamBurns\Psr7Symfony\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class RequestTest extends TestCase
{
    public function testWithHeader()
    {
        // ARRANGE
        $request = new Request(new SymfonyRequest());

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
        
        $result = $request->withProtocolVersion('1.1');
        
        $this->assertEquals('1.1', $result->getProtocolVersion());
    }

    public function testImmutabilityIsMaintainedWhenInstantiated()
    {
        $request = new Request($symfonyRequest = new SymfonyRequest());

        $symfonyRequest->headers->add(array('X-mutable' => 'true'));

        $header =$request->getHeader('X-mutable');
        $this->assertEquals($header, null);
    }
}
