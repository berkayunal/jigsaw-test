FROM php:8.0-fpm-alpine as app

RUN apk --update upgrade
RUN apk add bash && apk add nano

COPY docker/app/.ini/*.ini "$PHP_INI_DIR/conf.d/"

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer