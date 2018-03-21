.PHONY: setup setup-dev server

default: setup

setup: composer.phar
	./composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction

setup-dev: composer.phar
	./composer.phar install --dev --prefer-dist --no-interaction

server:
	php -S 0.0.0.0:8000 -t public/

composer.phar:
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	php composer-setup.php
	php -r "unlink('composer-setup.php');"
