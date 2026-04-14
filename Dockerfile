# ETAPA 1: Compilar assets de Node.js (Vite/Tailwind)
FROM node:20 AS node_build
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# ETAPA 2: Configurar PHP y Nginx
FROM php:8.2-fpm

# Instalar Nginx y dependencias de PostgreSQL
RUN apt-get update && apt-get install -y nginx libpq-dev unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Configurar directorio de trabajo
WORKDIR /var/www

# Copiar archivos del proyecto a la imagen
COPY . .

# Copiar los assets que compilamos en la Etapa 1
COPY --from=node_build /app/public/build ./public/build

# Instalar dependencias de Composer (Laravel)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Copiar configuraciones de Docker que creamos
COPY docker/nginx.conf /etc/nginx/sites-enabled/default
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Dar permisos necesarios
RUN chmod +x /usr/local/bin/entrypoint.sh
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto 80 para la web
EXPOSE 80

# Ejecutar el script de inicio
ENTRYPOINT ["entrypoint.sh"]