<?php
namespace Psr7SymfonySpec\SamBurns\Psr7Symfony;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UriSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('https://user:password@hostname.tld:8080/path/file.txt');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SamBurns\Psr7Symfony\Uri');
    }

    function it_can_tell_the_port_number()
    {
        $this->getPort()->shouldBe(8080);
    }

    function it_can_tell_the_hostname()
    {
        $this->getHost()->shouldBe('hostname.tld');
    }

    function it_can_tell_the_username_and_password()
    {
        $this->getUserInfo()->shouldBe('user:password');
    }

    function it_can_tell_the_username_if_there_is_no_password()
    {
        $this->beConstructedWith('https://user@hostname.tld:8080/path/file.txt');
        $this->getUserInfo()->shouldBe('user');
    }

    function it_can_tell_the_scheme()
    {
        $this->getScheme()->shouldBe('https');
    }
}
