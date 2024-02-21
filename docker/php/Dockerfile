FROM php:8.2-fpm-alpine

RUN set -o errexit -o nounset -o pipefail -o xtrace; \
    \
    # Install system packages.
    apk update; \
    apk upgrade; \
    apk \
        add --no-cache \
            aspell-dev \
            autoconf \
            bash \
            build-base \
            bzip2 \
            bzip2-dev \
            curl \
            freetype-dev \
            git \
            hiredis-dev \
            icu \
            libaio-dev \
            libbz2 \
            libmcrypt-dev \
            librdkafka-dev \
            libstdc++ \
            libtool \
            libwebp \
            libzip \
            libzip-dev \
            linux-headers \
            make \
            postgresql-dev \
            unzip \
            wget \
            yaml-dev \
            zip \
            zlib-dev; \
    \
    # Clean up.
    rm -fr /tmp/* /var/tmp/*

# Retrieve the script used to install PHP extensions from the source container.
COPY --from=mlocati/php-extension-installer:2.1.10 /usr/bin/install-php-extensions /usr/local/bin/

RUN set -o errexit -o nounset -o pipefail -o xtrace; \
    \
    # Install PHP extensions.
    install-php-extensions \
        pdo_pgsql \
        sqlsrv \
        xdebug \
        zip


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN set -o errexit -o nounset -o pipefail -o xtrace; \
    \
    composer --global config repos.packagist composer 'https://mirrors.tencent.com/composer/'
ENV COMPOSER_ALLOW_SUPERUSER=1


WORKDIR /var/www/html
