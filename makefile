help:
	@echo "\t install right after you cloned the repo"
	@echo "\t run = php artisan serve -> server at localhost:8000"
	@echo "\t clear to clean ALL possible clearing artisan commands"
	@echo "\t default admin is admin@nasa.org and password is apolo11"
install: composer.json
	composer install
	@echo "\t now change databse access in you .env file"
	@echo "\t And then, run make post-install"

post-install: composer.json .env
	php artisan migrate
	php artisan db:seed

run: composer.json vendor/
	php artisan serve

clear: composer.json
	php artisan clear-compiled
	php artisan cache:clear
	php artisan config:clear
	php artisan config:cache
	php artisan route:clear
	php artisan view:clear
	php artisan auth:clear-resets
