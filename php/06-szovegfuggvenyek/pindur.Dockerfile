FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY pindur.php pindur.php

ENTRYPOINT [ "php", "pindur.php" ]
