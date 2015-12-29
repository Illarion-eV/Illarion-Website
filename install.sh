#!/bin/bash

cd ${0%/*}

export COMPOSER_HOME="$(pwd)/.composer"
if [ -f ./composer.phar ];
then
	php composer.phar self-update
else
    php -r "readfile('https://getcomposer.org/installer');" | php
fi
rm -rf app/cache
php composer.phar install --optimize-autoloader --classmap-authoritative
php app/console cache:warmup --env=prod --no-debug
