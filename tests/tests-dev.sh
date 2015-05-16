#!/bin/bash

PROCESS_ID=`php -S localhost:8080 ./src-dev/public/index.php > /dev/null & echo $!`;
./vendor/bin/behat --config tests/behat/behat.yml --suite blackbox --append-snippets;
kill -9 $PROCESS_ID;
