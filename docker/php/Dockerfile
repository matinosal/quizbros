FROM php:8.0-fpm-alpine3.13

# Copy the application code
COPY . /app
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
VOLUME ["/app"]
