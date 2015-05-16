<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Mink\Session as MinkSession;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class BlackBoxContext implements Context, SnippetAcceptingContext
{
    /** @var GoutteDriver */
    private $driver;

    /** @var MinkSession */
    private $session;

    /**
     * @beforeScenario
     */
    public function setUp()
    {
        $this->driver  = new GoutteDriver;
        $this->session = new MinkSession($this->driver);
    }

    /**
     * @When I visit :url
     */
    public function iVisit($url)
    {
        $this->session->visit('http://localhost:8080' . $url);
    }

    /**
     * @Then I should get :expectedString
     */
    public function iShouldGet($expectedString)
    {
        $body = $this->session->getPage()->getContent();

        PHPUnit_Framework_Assert::assertEquals(
            $expectedString,
            unserialize($body)
        );
    }

    /**
     * @Given my browser is sending out the user agent :userAgent
     */
    public function myBrowserIsSendingOutTheLocale($userAgent)
    {
        $this->session->setRequestHeader('User-Agent', $userAgent);
    }
}
