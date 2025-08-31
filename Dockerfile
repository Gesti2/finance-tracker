# Multi-stage build for optimized prod image
# Stage 1: Build environment and Composer dependencies
FROM php:8.2-fpm AS php-base

# Install system dependencies
RUN apt-get update && apt-get install -y \
		git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    supervisor

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml zip opcache

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Development stage
FROM php-base AS development
ARG user=laravel
ARG uid=1000

# Install dev tools
RUN pecl install xdebug \
  && docker-php-ext-enable xdebug

# Create system user
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# PHP configuration for dev
COPY docker/php/php-dev.ini /usr/local/etc/php/conf.d/99-custom.ini

WORKDIR /var/www
USER $user
