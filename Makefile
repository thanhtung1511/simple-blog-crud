composer_install:
	composer install

db_migrate:
	php artisan migrate

db_seed:
	php artisan db:seed

storage_link:
	php artisan storage:link

optimize:
	php artisan optimize:clear

yarn_install:

	yarn install

yarn_build:
	yarn run prod

run:
	php artisan serve

setup: composer_install db_migrate db_seed storage_link optimize yarn_install yarn_build

