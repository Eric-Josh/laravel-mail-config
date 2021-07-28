## App Config 

# Installation

- Clone Repository
    > `git clone https://github.com/Eric-Josh/laravel-mail-config`

- Install all dependencies
    > `cd laravel-mail-config`

    > `composer install or composer update`

- Create DB

- Copy .env.example to .env
    > `cp .env.example .env`

- Generate APP_KEY
    > `php artisan key:generate`

- Add DB credentials to .env

- Run Migration
    > `php artisan migrate`

- Run the queue cmd for mail notification 
	- set QUEUE_CONNECTION and SESSION_DRIVER to database in .env

    > `php artisan queue:work` 

- Screenshot
	![alt text](https://deguide.nubianproject.org/images/laravel-mail-config.png)