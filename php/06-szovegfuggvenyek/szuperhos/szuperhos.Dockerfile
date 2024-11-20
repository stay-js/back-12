FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY szuperhos.php szuperhos.php

ENTRYPOINT [ "php", "szuperhos.php" ]
