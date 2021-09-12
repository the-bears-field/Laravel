#!/bin/bash

cd myapp
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
