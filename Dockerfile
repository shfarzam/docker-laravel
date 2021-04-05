FROM php:7.4-fpm-alpine


# Install dependencies
RUN apk add --no-cache \
      freetype \
      libjpeg-turbo \
      libpng \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && docker-php-ext-configure gd \
      --with-freetype=/usr/include/ \
      # --with-png=/usr/include/ \ # No longer necessary as of 7.4; https://github.com/docker-library/php/pull/910#issuecomment-559383597
      --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && apk del --no-cache \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
    && rm -rf /tmp/*

RUN apk update && apk add zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
#RUN apk clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Add user for laravel application
RUN addgroup -g 1000 -S www
RUN adduser  -u 1000 -S www -G www

RUN mkdir -p /var/www/vendor \
 && chown -R www:www /var/www


# Copy existing application directory contents
COPY ./src /var/www
# Copy composer.lock and composer.json ./src/composer.lock
COPY  ./src/composer.json /var/www/
COPY  ./src/composer.lock /var/www/


# Copy existing application directory permissions
COPY --chown=www:www ./src /var/www


# Change current user to www
USER www

#RUN chown 775 -R /var/www

# Set working directory
WORKDIR /var/www
RUN composer install
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]