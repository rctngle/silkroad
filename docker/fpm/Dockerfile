FROM php:7.3-fpm

# Install dependencies
RUN apt-get update \
  && apt-get install -y \
    libcurl4-gnutls-dev \
    libmagickwand-dev \
    libxml2 \
    cron \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libxslt1-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    ghostscript \
    imagemagick

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
  dom \
  curl \
  xml \
  simplexml \
  gettext \
  pcntl

RUN pecl install imagick

RUN docker-php-ext-enable imagick

RUN sed -i -- 's/;*\s*\(security\.limit_extensions\)\s*=.*$/\1 \= \.php \.xml/g' /usr/local/etc/php-fpm.d/www.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
