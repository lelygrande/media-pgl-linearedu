#!/usr/bin/env bash

set -e

PORT="${PORT:-10000}"

envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/sites-available/default

php artisan storage:link || true
php artisan config:clear || true
php artisan cache:clear || true
php artisan view:clear || true

php artisan config:cache || true
php artisan view:cache || true

php-fpm -D

nginx -g "daemon off;"
