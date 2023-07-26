#!/bin/sh
set -e
# Install composer dependencies
npm install
npm run build

echo "php artisan migrate ==============================="
php artisan key:generate
php artisan migrate
echo "==============================="

php-fpm


exec "$@"
