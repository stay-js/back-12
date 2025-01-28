FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

RUN adduser -D -u 1000 -s /bin/bash phpdocker \
  && apk update \
  && apk add --no-cache \
  bash \
  libzip-dev \
  zip \
  p7zip \
  tzdata \
  && docker-php-ext-install zip

COPY --from=composer:2.7.7 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install

COPY . .

USER phpdocker

ENTRYPOINT [ "php", "console.php" ]