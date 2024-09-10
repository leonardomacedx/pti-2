#!/bin/bash

# Instale as dependências do Composer
composer install --no-interaction --optimize-autoloader
composer upgrade
composer update
# Gere a chave da aplicação Laravel
php artisan key:generate


# Instale os pacotes npm
npm install
npm install --save-dev vite laravel-vite-plugin

# Construa os ativos
npm run build

php-fpm

