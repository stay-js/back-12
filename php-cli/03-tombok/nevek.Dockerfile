FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY nevek.php nevek.php

ENTRYPOINT [ "php", "nevek.php" ]
