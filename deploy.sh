#!/bin/bash

set -e

# Install dependencies based on lock file
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Migrate database
php artisan migrate --force

php artisan SetTableId
php artisan ImportPermission

# Clear cache
php artisan optimize

php artisan up
