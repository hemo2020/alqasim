# Dockerfile

# --- Base Stage ---
FROM php:7.4-apache as base
# Install system dependencies and PHP extensions required by Laravel
RUN apt-get update && apt-get install -y \
      libzip-dev \
      zip \
      unzip \
      libpng-dev \
      libjpeg-dev \
      libfreetype6-dev \
      nodejs \
      npm \
      && docker-php-ext-configure gd --with-freetype --with-jpeg \
      && docker-php-ext-install gd \
      && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip
# Configure Apache
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# --- Build Stage ---
FROM base as build
WORKDIR /var/www/html
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Copy existing application directory contents
COPY . .
# Install dependencies and build assets
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run production

# --- Release Stage ---
FROM base as release
WORKDIR /var/www/html
# Copy vendor and app from build stage
COPY --from=build /var/www/html/vendor ./vendor
COPY --from=build /var/www/html/public ./public
COPY . .
# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html
# Expose port 80 and start apache
EXPOSE 80
CMD ["apache2-foreground"]
