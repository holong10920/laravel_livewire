#!/bin/bash
set -e

if [ ! -d "/laravel/node_modules" ]
then
    composer install
    composer require livewire/livewire
    npm install
    php artisan config:clear
    php artisan config:cache
    php artisan migrate:install
else
    echo "node_modules dose exist!"
fi

npm run prod
php artisan migrate
php-fpm

exec "$@"
