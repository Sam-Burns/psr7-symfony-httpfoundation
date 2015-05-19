<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use SamBurns\Psr7Symfony\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class RequestContext implements Context, SnippetAcceptingContext
{
    /** @var SymfonyRequest */
    private $symfonyRequest;

    /** @var string */
    private $result;

    /**
     * @beforeScenario
     */
    public function setUp()
    {
        $this->symfonyRequest = new SymfonyRequest();
    }

    /**
     * @Given the client's browser is sending out the user agent :userAgent
     */
    public function theClientSBrowserIsSendingOutTheUserAgent($userAgent)
    {
        $this->symfonyRequest->headers->set('User-Agent', $userAgent);
    }

    /**
     * @When I check the user agent
     */
    public function iCheckTheUserAgent()
    {
        $requestAdapter = new Request($this->symfonyRequest);
        $this->result = $requestAdapter->getHeader('User-Agent');
    }

    /**
     * @Then I should get :expectedResult
     */
    public function iShouldGet($expectedResult)
    {
        PHPUnit_Framework_Assert::assertEquals($expectedResult, $this->result);
    }

    /**
     * @Given the URI is requested is :uriAsString
     */
    public function theUriIsRequestedIs($uriAsString)
    {
        $this->symfonyRequest = SymfonyRequest::create($uriAsString);
    }

    /**
     * @When I check the URI
     */
    public function iCheckTheUri()
    {
        $requestAdapter = new Request($this->symfonyRequest);
        $this->result = (string) $requestAdapter->getUri();
    }
}
