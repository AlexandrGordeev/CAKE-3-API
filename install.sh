#!/bin/bash

RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m'

echo -e "${GREEN}Installing composer{NC}"
EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]
then
    >&2 echo -e "${RED}ERROR: Invalid composer installer signature${NC}"
    rm composer-setup.php
    exit 1
fi
php composer-setup.php --quiet
RESULT=$?
rm composer-setup.php

echo -e "${GREEN}Installing vendors${NC}"
php composer.phar install --no-dev

echo -e "${GREEN}Run migrations${NC}"

bin/cake migrations migrate

echo -e "${GREEN}Run seed command{NC}"
bin/cake migrations seed

echo -e "${GREEN}Done, run the server at http://0.0.0.0:8000/${NC}"

