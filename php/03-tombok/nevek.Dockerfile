FROM php:8.3.8-cli-alpine3.20

RUN apk add --no-cache bash

WORKDIR /app

COPY nevek.php nevek.php

ENTRYPOINT [ "php", "nevek.php" ]
