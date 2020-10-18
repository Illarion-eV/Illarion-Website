FROM php:7.3-apache

ENV APACHE_DOCUMENT_ROOT /var/www/illarion/website

RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y ssl-cert libpq-dev && \
    rm -r /var/lib/apt/lists/* && \
    docker-php-ext-install -j$(nproc) pgsql && \
    sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    a2enmod ssl && \
    a2ensite default-ssl
