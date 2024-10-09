FROM php:8.3.8-cli-alpine3.20

RUN apk add --no-cache bash

WORKDIR /app

COPY szamok.php szamok.php

ENTRYPOINT [ "php", "szamok.php" ]