FROM php:8.0-fpm-alpine as php

# Install deps
RUN apk --update upgrade \
    && apk add bash \ 
    && apk add nano \ 
    && apk add nodejs npm

COPY docker/app/.ini/*.ini "$PHP_INI_DIR/conf.d/"