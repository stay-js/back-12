FROM php:8.3.8-cli-alpine3.20

WORKDIR /app

COPY szamok.php szamok.php

ENTRYPOINT [ "php", "szamok.php" ]
