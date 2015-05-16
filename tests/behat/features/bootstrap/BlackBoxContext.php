<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Message\Response as GuzzleResponse;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class BlackBoxContext implements Context, SnippetAcceptingContext
{
    /** @var GuzzleClient */
    private $curlClient;

    /** @var GuzzleResponse */
    private $lastResponse;

    /**
     * @beforeScenario
     */
    public function setUp()
    {
        $this->curlClient = new GuzzleClient();
    }

    /**
     * @When I visit :url
     */
    public function iVisit($url)
    {
        $this->lastResponse = $this->curlClient->get('http://localhost:8080' . $url)->send();
    }

    /**
     * @Then I should get :expectedString
     */
    public function iShouldGet($expectedString)
    {
        $response = $this->lastResponse->getBody(true);

        PHPUnit_Framework_Assert::assertEquals(
            $expectedString,
            unserialize($response)
        );
    }

    /**
     * @Given my browser is sending out the user agent :userAgent
     */
    public function myBrowserIsSendingOutTheLocale($userAgent)
    {
        $this->curlClient->setUserAgent($userAgent);
    }
}
