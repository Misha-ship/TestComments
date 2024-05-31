FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    supervisor \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    nginx

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip sockets pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy supervisor configuration
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy nginx configuration
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Install Laravel packages
RUN composer install

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
