FROM php:7.3-fpm

# Install dependencies
RUN apt-get update \
  && apt-get install -y \
    cron \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libxslt1-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    ghostscript

# Install required PHP extensions
RUN docker-php-ext-install \
  gd \
  intl \
  mbstring \
  mysqli \
  pdo_mysql \
  xsl \
  zip \
  soap \
  opcache \
  dom


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
