#!/usr/bin/env bash
set -euo pipefail

echo "Installing PHP dependencies..."
composer install --no-dev --working-dir=/var/www/html --prefer-dist --optimize-autoloader

echo "Caching config and routes..."
php artisan config:cache
php artisan route:cache
php artisan storage:link || true

echo "Running database migrations..."
php artisan migrate --force
