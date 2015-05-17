<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

class WhiteBoxContext implements Context, SnippetAcceptingContext
{
    /**
     * @Given the client's browser is sending out the user agent :arg1
     */
    public function theClientSBrowserIsSendingOutTheUserAgent($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I check the user agent
     */
    public function iCheckTheUserAgent()
    {
        throw new PendingException();
    }

    /**
     * @Then I should get :arg1
     */
    public function iShouldGet($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given the URI is requested is :arg1
     */
    public function theUriIsRequestedIs($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I check the URI
     */
    public function iCheckTheUri()
    {
        throw new PendingException();
    }
}
