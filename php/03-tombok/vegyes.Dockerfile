FROM php:8.3.8-cli-alpine3.20

RUN apk add --no-cache bash

WORKDIR /app

COPY vegyes.php vegyes.php

ENTRYPOINT [ "php", "vegyes.php" ]
