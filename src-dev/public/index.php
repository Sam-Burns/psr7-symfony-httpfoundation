<?php

require __DIR__ . '/../../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use SamBurns\Psr7Symfony\Request;

$app = new Silex\Application();

$app->get(
    '/what-was-the-user-agent/',
    function (SymfonyRequest $request) {
        $adaptedRequest = new Request($request);
        return serialize($adaptedRequest->getHeader('User-Agent'));
    }
);

$app->error(
    function (\Exception $exception, $code) {
        return new SymfonyResponse(serialize($exception->getMessage()) . serialize($code));
    }
);

$app->run();
