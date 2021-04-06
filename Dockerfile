FROM php:7.4-fpm-alpine


# Install dependencies

RUN apk update && apk add zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    openssl

# Clear cache
#RUN apk clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Add user for laravel application
RUN addgroup -g 1000 www \
    && adduser -D -u 1000 -G www -s /bin/bash www &&\
    chown www:www -R /var/www &&\
        chmod 775 /var/www &&\
        chown -R www /var/www


# Copy existing application directory permissions
COPY --chown=www:www ./src /var/www

# Copy existing application directory contents
COPY ./src /var/www
# Copy composer.lock and composer.json ./src/composer.lock
COPY  ./src/composer.json /var/www/
COPY  ./src/composer.lock /var/www/



# Change current user to www
USER www

#RUN chown 775 -R /var/www

# Set working directory
WORKDIR /var/www

RUN composer install
CMD php artisan serve --host=0.0.0.0 --port=8000

#COPY ./package*.json /var/www
RUN apk add --update nodejs nodejs-npm

RUN php artisan config:cache
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
