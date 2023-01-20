help:
	@echo "\n\
Usage: \n\n\
    make \n\
		 | init                         Поднять приложение с нуля\n\
		 | up                           Запустить установленные контейнеры\n\
		 | down                         Остановить и уничтожить все контейнеры приложения\n\
		 | restart                      Перезапуск контейнеров\n\
		 | test                         Запуск тестов\n\
         | app-lint                     Исправить котостайл\n\
         | shell-php 					Запустить консоль контейнера\n\
         | app-rector-dry 				Запустить Ректора с проверкой\n\
         | app-rector 					Запустить Ректора\n\
         | app-analyze 					Проверить через Psalm\n\
         \n\
    "

init: docker-down-clear \
	docker-pull docker-build up \
	app-init
up: docker-up
down: docker-down
restart: down up
test: app-test

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull --include-deps

docker-build:
	docker-compose build

app-composer-install:
	docker-compose run --rm app-php-cli composer install

app-init: permissions app-cache-clear app-composer-install

app-cache-clear:
	docker run --rm -v ${PWD}/:/app -w /app alpine sh -c 'rm -rf var/cache/* var/test/*'

permissions:
	docker run --rm -v ${PWD}/:/app -w /app alpine chmod 777 var/cache var/test

app-test:
	docker-compose run --rm app-php-cli composer test

app-lint:
	docker-compose run --rm app-php-cli composer lint
	docker-compose run --rm app-php-cli composer cs-fix

app-analyze:
	docker-compose run --rm app-php-cli php vendor/bin/psalm

app-rector:
	docker-compose run --rm app-php-cli vendor/bin/rector process

app-rector-dry:
	docker-compose run --rm app-php-cli vendor/bin/rector process  --dry-run

shell-php:
	docker-compose exec app-php-cli bash
