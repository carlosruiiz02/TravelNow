FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copiar proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chmod -R 775 storage bootstrap/cache

# Puerto
EXPOSE 10000

# Arrancar Laravel
CMD php artisan config:clear && php artisan cache:clear && php artisan serve --host=0.0.0.0 --port=10000