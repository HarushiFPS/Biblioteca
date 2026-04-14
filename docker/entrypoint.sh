#!/bin/sh

# Ejecutar las migraciones de la base de datos automáticamente
php artisan migrate --force

# Iniciar PHP-FPM en segundo plano
php-fpm -D

# Iniciar Nginx en primer plano para mantener el contenedor vivo
nginx -g "daemon off;"