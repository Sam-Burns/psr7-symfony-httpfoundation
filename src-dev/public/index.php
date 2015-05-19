<?php

require __DIR__ . '/../../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use SamBurns\Psr7Symfony\Request;

$app = new Silex\Application();

$app->get(
    '/what-was-the-user-agent/',
    function (SymfonyRequest $request) {
        $adaptedRequest = new Request($request);
        return serialize($adaptedRequest->getHeader('User-Agent'));
    }
);

$app->run();
