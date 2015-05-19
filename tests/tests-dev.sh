#!/bin/bash

./vendor/bin/phpspec run --config tests/phpspec/phpspec.yml

./vendor/bin/phpunit --config tests/phpunit/phpunit.xml

./vendor/bin/behat --config tests/behat/behat.yml --suite request --append-snippets;

PROCESS_ID=`php -S localhost:8080 ./src-dev/public/index.php > /dev/null & echo $!`;
./vendor/bin/behat --config tests/behat/behat.yml --suite webserver --append-snippets;
kill -9 $PROCESS_ID;
