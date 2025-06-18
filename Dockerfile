# Use the official PHP image with Apache
FROM php:8.2-apache

# Install necessary extensions and dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql \
    && a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy Laravel project files
COPY . .

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Create storage link
RUN php artisan storage:link

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
